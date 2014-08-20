<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="WebGimnasio.Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        Id Empresa:<asp:TextBox ID="txtEmpresa" runat="server" Width="79px"></asp:TextBox>
        CIF:<asp:TextBox ID="txtCIF" runat="server" Width="79px"></asp:TextBox>
        <br />
        <asp:Button ID="btnReserva" runat="server" Text="Reservar" 
            onclick="btnReserva_Click" />
    
    </div>
    </form>
</body>
</html>
