<?if (!empty($_COOKIE["agriautorise"])) { ?>
    <section class = "autorizInfoSection">
      <div class = "inner">
        <leftside>Добрый день: <span id = "nameAgentHead" class = "nameAgentHead"></span></leftside>
        <rightside class="control">
          <a href="<?echo get_the_permalink(412); ?>" class="tocabinet">Войти в личный кабинет</a>
        </rightside>
         <script>
          document.addEventListener("DOMContentLoaded", function(e) { 
              document.getElementById("nameAgentHead").innerHTML = localStorage.getItem("name");
          });
        </script>
      </div>
    </section>
  <?}?>