<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="frmError.aspx.cs" Inherits="WebTaxiMobil.frmError" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    <h2>Ha ocurrido un error.</h2>
      <p>
        <asp:Label ID="innerMessage" runat="server" Font-Bold="true" Font-Size="Large" /><br />
          <pre>
        <asp:Label ID="innerTrace" runat="server" />
      </pre>

      </p>
       <p>
      Error Message:<br />
      <asp:Label ID="exMessage" runat="server" Font-Bold="true" 
        Font-Size="Large" />
    </p>
    <pre>
      <asp:Label ID="exTrace" runat="server" Visible="false" />
    </pre>

    <ul><li>
    <asp:HyperLink ID="goHome" runat="server" Text="Volver a login" 
            NavigateUrl="~/Default.aspx"  />
            </li></ul>
    </div>
    </form>
</body>
</html>
