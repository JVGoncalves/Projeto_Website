<?php
    session_start(); // ATIVA NO php O USO DAS VARIÁVEIS DE SESSÃO
    
    ///// INCLUSÃO DO ARQUIVO conexaoDB.php NA PÁGINA ATUAL
    require_once('conexaoBanco.php');

    ///// CHAMA A FUNÇÃO PARA CONECTAR COM O BANCO DE DADOS QUE FOI CRIADO NA PÁGINA conexaoBD.php
    ConexaoBanco();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $trava_conteudo = "";
    $trava_fale_conosco = "";
    $trava_produto = "";
    $trava_usuarios = "";

    if($_SESSION['nivel'] != 0){
    
    $sql = "SELECT * FROM tbl_nivel WHERE idNivel = ".$_SESSION['nivel'];
        
    $select = mysql_query($sql);
    $rsN = mysql_fetch_array($select);
        
    $conteudo = $rsN['admConteudo'];
    $f_c = $rsN['admFaleConosco'];
    $produto = $rsN['admProduto'];
    $usuario = $rsN['admUsuario'];
    
    if($conteudo == 1)
    {
        $trava_conteudo = " href='admConteudo.php' ";
    }else{
        $trava_conteudo = "";
    }
    
    if($f_c == 1)
    {
        $trava_fale_conosco = " href='admFaleConosco.php' ";
    }else{
        $trava_fale_conosco = "";
    }
    
    if($produto == 1)
    {
        $trava_produto = " href='admProdutos.php' ";
    }else{
        $trava_produto = "";
    }
    
    if($usuario == 1)
    {
        $trava_usuarios = " href='admUsuarios.php' ";
    }else{
        $trava_usuarios = "";
    }
}
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CMS | Home</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleHome.css">
        <link rel="icon" type="image/jpg" href="imagens/config.png"/>
    </head>
    <body>
        <!-- DIV PRINCIPAL -->
        <div id="principal">
            <!-- CABEÇALHO DO CMS -->
            <div id="cabecalho">
                <div id="titulo">
                    <p id="titulo_cms"><b>CMS</b> - Sistema de Gerenciamento do Site</p>
                </div>
                <div id=logo>
                    <img src="imagens/logo.png" alt="Logo">
                </div>
            </div>
            <!-- MENU DO CMS -->
            <div id="area_menu">
                <div class="menus">
                    <div class="icone_menu">
                        <a <?php echo($trava_conteudo)?>><img src="imagens/conteudo.png" alt="Conteúdo" class="acende"></a>
                    </div>
                    <div class="desc_menu">
                        <p class="desc_formatacao">Adm. Conteúdo</p>
                    </div>
                </div>
                <div class="menus">
                    <div class="icone_menu">
                        <a <?php echo($trava_fale_conosco)?>><img src="imagens/faleConosco.png" alt="Fale Conosco" class="acende"></a>
                    </div>
                    <div class="desc_menu">
                        <p class="desc_formatacao">Adm. Fale Conosco</p>
                    </div>
                </div>
                <div class="menus">
                    <div class="icone_menu">
                        <a <?php echo($trava_produto)?>><img src="imagens/produtos.png" alt="Produtos" class="acende"></a>
                    </div>
                    <div class="desc_menu">
                        <p class="desc_formatacao">Adm. Produtos</p>
                    </div>
                </div>
                <div class="menus">
                    <div class="icone_menu">
                        <a <?php echo($trava_usuarios)?>><img src="imagens/usuarios.png" alt="Usuários" class="acende"></a>
                    </div>
                    <div class="desc_menu">
                        <p class="desc_formatacao">Adm. Usuários</p>
                    </div>
                </div>
                <div id="bemVindo">
                    <p id="desc_welcome">
                        <b>Bem Vindo(a):<br></b>
                        <?php echo(utf8_encode($_SESSION['usuario'])); ?>
                    </p>
                    <a id="logout" href="../index.php">
                        Fazer logout
                    </a>
                </div>
            </div>
            <!-- CONTEÚDO DO CMS -->
            <div id="conteudo">
                <p id="desc_vindo">Bem Vindo(a) ao Sistema<br>
                Delícia Gelada</p>
            </div>
            <!-- RODAPÉ DO CMS -->
            <div id="rodape">
                <div id="center">
                    <p id="desc_rodape">Desenvolvido por João Victor Gonçalves</p>
                </div>
            </div>
        </div>
    </body>
</html>