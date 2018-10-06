<?php session_start(); ?>
<body>
    <header style="width:100%; height:150px; background-color:red">
        <h1> CECI EST UN HEADER</h1>
        <?php 
            if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] !== "") {
                ?>
                <p>Bonjour <?php echo $_SESSION['loggued_on_user']; ?></p>
                <br />
                <a href="/ft_minishop_git/panier/validation.php">Mon panier</a>
                <?php 
                    if (isset($_SESSION['panier']) && $_SESSION['panier'] != "") { echo "(1)";}
                ?>
                <a href="/ft_minishop_git/user/logout.php" title="Disconnect"><img src="/ft_minishop_git/img/close.gif" alt="Disconnect" height="20px" width="20px" align="right" style="padding-top:5px"/></a>
                <form action="/ft_minishop_git/user/delete.php" method="POST">
                <button type="submit" name="submit">
                   <img src="/ft_minishop_git/img/delete.png" alt="Disconnect" height="20px" width="20px" align="right" style="padding-top:30px"/></a>
                </button>
                </form>
                <?php
            }
            else {
                ?>
                    <a href="/ft_minishop_git/template/create.html">creer un compte </a>
                    <br />
                    <a href="/ft_minishop_git/template/modif.html">Modifier son compte</a>
                    <br />
                    <a href="/ft_minishop_git/template/login.html">Se connecter</a>
                    <br />
                    <a href="/ft_minishop_git/panier/validation.php">Mon panier</a>
                    <?php 
                        if (isset($_SESSION['panier']) && $_SESSION['panier'] != "") { echo "(1)";}
                    ?>
                <?php
            }
        ?>
    </header>
</body>
</html>