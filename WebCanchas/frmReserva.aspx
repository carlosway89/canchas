<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="frmReserva.aspx.cs" Inherits="WebGimnasio.frmReserva" %>
<%@ Register Assembly="Flan.Controls" Namespace="Flan.Controls" TagPrefix="cc1" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html >
<head runat="server">
    <title>Reserva</title>
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
<asp:Label runat="server" ID="lblIdEmpresa" Text="0" />
</div>
<div style="display:inline">
<div align="left">
Seleccione instalación:
<asp:DropDownList ID="ddlInstalaciones" runat="server" DataTextField="Nombre"    CssClass="Combo"
        DataValueField="Id" DataSourceID="odsInstalaciones" AutoPostBack="True" 
        onselectedindexchanged="ddlInstalaciones_SelectedIndexChanged" 
        Width="200px" ondatabound="ddlInstalaciones_DataBound">
</asp:DropDownList>
</div>
<div align="right">
Mes: <asp:Label ID="lblMes" runat="server" />
</div>
<br />
DEPORTE: <asp:Label ID="lblSport" runat="server" />
<asp:ObjectDataSource ID="odsInstalaciones" runat="server"  CacheKeyDependency="ddlInstalaciones"
        SelectMethod="GetInstalaciones" EnableCaching="True"  EnableViewState="True"
        TypeName="WebGimnasio.Datos" >
<SelectParameters>
<asp:ControlParameter ControlID="lblIdEmpresa" PropertyName="Text" DefaultValue="0" 
        Name="IdEmpresa" Type="Int32" />
</SelectParameters>
</asp:ObjectDataSource>

</div>
<br />
<span >Para reservar haga clic en uno de los recuadros verdes: </span>
    <br />
    <asp:Table ID="tblReservas" runat="server">
    </asp:Table>
    <div align="right">
                            <table style='font-size:10px'><tr style='height:12px'>
                            <td style='width:12px; background-color:Lime'></td>
                            <td align='left' style='width:80px'>Libre</td>
                            <td style='width:12px; background-color:Yellow'></td>
                            <td align='left'>Pendiente</td>
                            <td style='width:12px; background-color:Red'></td>
                            <td align='left'>Reservado</td>
                            </tr></table>

                  </ContentTemplate>
                  </asp:UpdatePanel>
 <asp:UpdateProgress id="upUpdateProgress"
        runat="server" AssociatedUpdatePanelID="updMain" DisplayAfter="10">
        <progresstemplate>
<div class="modalBackground">
<div  align="center" valign="middle">
 <asp:Image id="Image1" runat="server" ImageUrl="Images/indicator.gif"></asp:Image><br />Espere, está procesando.... 
 </div>
 </div>
</progresstemplate>

    </asp:UpdateProgress>                            

    
 </form>
</body>
</html>