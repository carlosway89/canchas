<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="frmMakeReserva.aspx.cs" Inherits="WebGimnasio.frmMakeReserva" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html">
<head runat="server">
    <title>Hacer reserva</title>
    <meta http-equiv="AUTHOR" content="AdeaLoxica" />
     <meta http-equiv="copyright" content="AdeaLoxica C.B. 2014" />
    <link  rel="stylesheet"  type="text/css" href="Styles/Site.css" />

   <script type="text/javascript" src="Scripts/Reservas.js" >
    </script>

</head>
<body>
    <form id="form1" runat="server">
     <asp:ScriptManager ID="ScriptManager1" runat="server" EnableScriptGlobalization="True" EnableScriptLocalization="True" AsyncPostBackTimeOut="36000">
        </asp:ScriptManager>
        <asp:UpdatePanel ID="updMain" runat="server">
        <ContentTemplate>
        <div style="display:none">
<asp:Label runat="server" ID="lblIdEmpresa" Text="10" />
</div>
	
        <table align="center" width="500px" cellpadding="1px" cellspacing="1px">
            
            <tr width="150px">
                <td  height="25px">
                    <span>Fecha:</span>
                </td>
                <td >
                    <asp:Label id="lblFecha" runat="server" />
                </td>
            </tr>
            <tr width="150px">
                <td  height="25px">
                    <span>Precio:</span>
                </td>
                <td >
                    <asp:Label id="lblPrice" runat="server" />
                </td>
            </tr>
            <tr>
                <td height="25px">
                    <asp:Label id="lblTInstal" runat="server" Text="Instalación:" />
                </td>
                <td>
                    <asp:Label id="lblInstal" runat="server" />
                </td>
            </tr>
            <tr>
                <td>
                    <span >Nombre:</span>
                </td>
                <td>
                <asp:TextBox ID="txtNombre" runat="server" CssClass="Texto" onkeydown="return onKeyDown();" />
                </td>
            </tr>
              <tr>
                <td>
                    <span >DNI:</span>
                </td>
                <td>
                <asp:TextBox ID="txtDNI" runat="server"  CssClass="Texto" onkeydown="return onKeyDown();" />
                </td>
            </tr>
            <tr>
                <td>
                    <span >Correo electrónico:</span>
                </td>
                <td>
                <asp:TextBox ID="txtEmail" runat="server"  CssClass="Texto" onkeydown="return onKeyDown();" />
                </td>
            </tr>
            <tr>
                <td>
                    <span >Teléfono:</span>
                </td>
                <td>
                    <asp:TextBox ID="txtTelefono" runat="server"  CssClass="Texto" onkeydown="return onKeyDown();" />
                </td>
            </tr>            
            
        </table>
        <table align="center" width="100%" cellpadding="3px" cellspacing="3px">
            <tr>
                <td>
                      <div id="pnlPago"  class="pnlPago">
		
                        Forma de pago:<br />
                        <asp:Label ID="lblCuenta" runat="server" />
                        <br />
                        <asp:Label ID="lblCondiciones" runat="server" />
                        <br />
                        <asp:Label ID="lblName" runat="server" />
                        <br />
                        <asp:Label ID="lblEmail" runat="server" />
                    
	</div>
                </td>
            </tr>
        </table>
        
        <table align="center">
            <tr>
                <td>
                    <asp:Button Id="btnOk"  Text="Reservar" runat="server" onclick="btnOk_Click" CssClass="Buttons" OnClientClick="return confirm('¿Esta seguro de reservar la hora seleccionada?')" />
                    <asp:Button Id="btnCancel"  Text="Volver" runat="server" CssClass="Buttons" 
                        onclick="btnCancel_Click" />
                     <br />
                    <asp:Label ID="lblError" runat="server"  CssClass="Error"/>
                </td>
               
            </tr>
        </table>
        
</ContentTemplate>
        </asp:UpdatePanel>
    <asp:UpdateProgress id="upUpdateProgress"
        runat="server" AssociatedUpdatePanelID="updMain" DisplayAfter="0">
        <progresstemplate>
<div class="modalBackground">
<div class="msgModal">
 <asp:Image id="Image1" runat="server" ImageUrl="Images/indicator.gif"></asp:Image><br />Espere, está procesando.... 
 </div>
 </div>
</progresstemplate>

    </asp:UpdateProgress>      
    </form>
</body>
</html>
