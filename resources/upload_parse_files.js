define([
    'text!/templates/tab-content-gallery.php',
    'views/tab-gallery-images',
    'beans',
    'collections/parse',
    'models/parse',
    'channel'
],
    function(tmpl,GalleryImages,Beans,ParseCollection,ParseModel,Channel) {
        return Backbone.View.extend({
            template: Handlebars.compile(tmpl),
            beans: new Beans,
            debug: true,
            array:[],
            events: {
                'change .input-add-photo':'upload_image',
                'click .edit-title':'edit_album',
                'click .delete-title':'delete_album',
                'click .title-save':'title_save',
                'click .title-cancel':'cancel_edit'

            },
            initialize: function() {


            },
            call_images:function(){

              var that=this;
              var content=this.$el.find('.tab-gallery-images');

              var album = new ParseCollection({
                name: 'album',
                    where:{
                        gallery:{
                            __type: 'Pointer',
                            className: 'gallery',
                            objectId: that.objectid()
                        }                        
                    }

                });

                album.fetch({
                    success: function(collection,results,options){   

                        content.empty();

                        $.each( results.results,function(index,result){
                            view = new GalleryImages({
                                model:new ParseModel(result)
                            });
                            
                            content.append(view.render().el);
                            
                        });

                        content.append(that.set_button_uploader());
                        
                    }
                });   

            },
            render: function() {

                var that=this;

                this.$el.html( Handlebars.compile( tmpl)(this));
                
                this.$el.fadeIn(2000);

                this.call_images();

                Channel.on('update.album',function(){
                    that.call_images();
                });
                

                return this;
            },
            upload_image:function(e){
                e=e?e:window.event;
                var files = e.target.files || e.dataTransfer.files;
                  // Our file var now holds the selected file                

                this.upload_photo(files);
            },
            upload_photo:function(files){

                var that=this;
                var id=files.length - 1;
                var container=that.$el.find('.tab-gallery-images');
                for (var ini = files.length - 1; ini >= 0; ini--) {
                    console.log(ini);
                    container.append(that.set_image_loader(ini));
                    container.find('li.image-uploader').toggle('hide');

                    var img=files[ini];

                    var serverUrl = 'https://api.parse.com/1/files/' + img.name;

                      $.ajax({
                        type: "POST",
                        beforeSend: function(request) {
                          request.setRequestHeader("X-Parse-Application-Id", 'PudrdGU0QlTFG1zsyMuFD3pYRAZncLN8Nw7wbRK2');
                          request.setRequestHeader("X-Parse-REST-API-Key", 'jbibmnMWYKrbymZhK3dW2PhvltsH5X89DKJDkAXg');
                          request.setRequestHeader("Content-Type", img.type);
                        },
                        url: serverUrl,
                        data: img,
                        processData: false,
                        contentType: false,
                        success: function(data) {

                            that.update_album(data,id);
                            id--;

                        },
                        error: function(data) {
                          var obj = jQuery.parseJSON(data);
                          that.beans.user_alert('error',that.$el.find('div.errors'),obj.error);
                        }
                      });

                };

                

            },
            update_album:function(data,id){
                

                var that=this;
                var container=that.$el.find('.tab-gallery-images');

                var album = new ParseModel({name: 'album'});
                album.set('picture',{
                    __type: 'File',
                    name: data.name,
                    url: data.url
                });

                album.set('gallery',{
                        __type: 'Pointer',
                        className: 'gallery',
                        objectId: that.objectid()
                    });

                album.save(null,{
                    success: function(model,result,options){
                        console.log(id);

                        container.find('li.image-loader-'+id).remove();

                        if (id==0){
                            container.find('li.image-uploader').toggle('hide');                        
                            Channel.trigger('update.album');
                        }
                                                   
                    },
                    error: function(model,xhr,options){
                        
                    }
                });

                

            },
            title_save:function(){

                var that=this;
               

                var error=that.$el.find('div.errors');
                var input=this.$el.find('input.form-control');
                var gallery = new ParseModel({name: 'gallery'});
                
                gallery.set('objectId',this.objectid());                
                gallery.set('title',input.val());

                input.attr('disabled','disabled');

                gallery.save(null,{
                    success: function(model,result,options){
                         
                        that.$el.find('.text-black').html(model.attributes.title);                        
                        that.beans.user_alert('success',error,'the album was updated successfully!');
                        that.cancel_edit();
                        input.removeAttr('disabled');
                        
                                           
                    },
                    error: function(model,xhr,options){
                        
                    }
                });

                

            },
            edit_album:function(){
                var that=this;
                this.$el.find('.box-title').fadeOut(function(){
                    that.$el.find('.input-group').fadeIn();
                });                

            },
            cancel_edit:function(){
                var that=this;
                this.$el.find('.input-group').fadeOut(function(){
                    that.$el.find('.box-title').fadeIn();
                }); 
            },
            delete_album:function(){
                var that=this;
                if(confirm("Are you sure you want to delete this album with all pictures?")){
                    
                    var gallery = new ParseModel({name: 'gallery'});

                    
                    
                    gallery.set('objectId',this.objectid());

                    gallery.destroy({
                        success: function(model, response) {

                            that.find_relation_album();

                            that.$el.fadeOut().remove(); 
                        }
                    });     

                }else{
                    
                    return false;
                
                }

            },
            find_relation_album:function(){

                var that=this;

                var Class = Parse.Object.extend('album');
                var query = new Parse.Query(Class);
                query.equalTo("gallery", {
                                __type: 'Pointer',
                                className: 'gallery',
                                objectId: that.objectid()
                            });

                query.find({
                  success:function(list) {
                    

                    for (var i = 0; i < list.length; i++) { 
                      var object = list[i];
                      var album = new ParseModel({name: 'album'});
                      album.set('objectId',object.id);
                      album.destroy();
                    }                    
                    

                  }
                });
            },
            set_button_uploader:function(){
                var button='<li class="image-uploader"><a class="link"><div class="add-new-photo text-center"><input class="input-file input-add-photo" type="file" multiple><span class="glyphicon glyphicon-upload"></span><br/><label>Upload Picture</label></input></div></a></li>';

                return button;
            },
            set_image_loader:function(id){
                var loader='<li class="image-loader-'+id+'"><a class="link"><div class="new-photo text-center"><img src="../img/preloader3.gif" /><br/></input></div></a></li>';

                return loader;
            },           
            title:function(){ return this.model.get('title')!=' '?this.model.get('title'):'New Album'; },
            objectid:function(){ return this.model.get('objectId'); }

        });
    }
);