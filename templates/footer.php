<footer>
     <?php 
         if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === '1') {?>
             <div class="footer_admin">
                 <a href="index.php?action=addArticle" class="footer_link">AJOUTER UN ARTICLE</a>
                     <span> | </span>
                 <a href="index.php?action=admin" class="footer_link">ADMINISTRER</a>
             </div></br> 
         <?php 
        }
    ?> 
    <p class="footer">2023 © Tous droits réservés</p>
</footer>