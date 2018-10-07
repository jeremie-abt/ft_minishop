<?php session_start();
$i = 0;?>
<body>
    <header style="width:100%; height:150px; background-color:grey; position:relative">
        <h1> CECI EST UN HEADER</h1>
        <?php
            if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] !== "") {
                ?>
                <p>Bonjour <?php echo $_SESSION['loggued_on_user']['login']; ?></p>
                <br /> <a href="/ft_minishop/template/modif.html">Modifier son compte</a>
                <a href="/ft_minishop/panier/validation.php">Mon panier</a>
                <?php
                foreach ($_SESSION['panier'] as $v) {
                  $i++;
                  }
                    if (isset($_SESSION['panier']) && $_SESSION['panier'] != "") { echo "($i)";}
                ?>
                <a href="/ft_minishop/user/logout.php" title="Disconnect"><img src="/ft_minishop/img/close.gif" alt="Disconnect" height="20px" width="20px" align="right" style="padding-top:5px"/></a>
                <form style="position:absolute; top:0; right:0" action="/ft_minishop/user/delete.php" method="POST">
                <button type="submit" name="submit">
                   <img src="/ft_minishop/img/delete.png" alt="delete" height="20px" width="20px" align="right" style="padding-top:30px"/></a>
                </button>
                </form>
                <?php
            }
            else {
                ?>
                    <a href="/ft_minishop/template/create.html">creer un compte </a>
                    <br />

                    <br />
                    <a href="/ft_minishop/template/login.html">Se connecter</a>
                    <br />
                    <a href="/ft_minishop/panier/validation.php">Mon panier</a>
                    <?php
                    foreach ($_SESSION['panier'] as $v) {
                      $i++;
                      }
                        if (isset($_SESSION['panier']) && $_SESSION['panier'] != "") { echo "($i)";}
                    ?>
                <?php
            }
        ?>
    </header>
</body>
</html>
