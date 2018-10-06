<?php session_start(); ?>
<body>
    <header style="width:100%; height:150px; background-color:red">
        <h1> CECI EST UN HEADER</h1>
        <?php 
            if (isset($_SESSION['loggued_on_user'])) {
                ?>
                <p>Bonjour <?php echo $_SESSION['loggued_on_user']; ?></p>
                <?php
            }
            else {
                ?>
                    <a href="/ft_minishop/template/create.html">creer un compte </a>
                    <br />
                    <a href="/ft_minishop/template/modif.html">Modifier son compte</a>
                    <br />
                    <a href="/ft_minishop/panier/validation.php">Mon panier</a>
                <?php
            }
        ?>
    </header>
</body>
</html>