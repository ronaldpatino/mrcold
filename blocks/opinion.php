<!-- Opinion-->
<div class='container margen-container'>
    <div class="row-fluid" id='opinion'>
        <div class="span4">
            <?php if ( dynamic_sidebar('caricatura') ) : else : endif; ?>
        </div>


        <div class="span4">
            <h2><a href="<?php echo get_home_url()?>/opinion" >Opini&oacute;n</a></h2>
            <?php if ( dynamic_sidebar('bloqueopinion') ) : else : endif; ?>
        </div>

        <div class="span4">
            <h2><a href="<?php echo get_home_url()?>/temas" >Temas</a></h2>
        </div>
    </div>
</div>
<!-- Fin Opinion-->