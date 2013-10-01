<!-- Opinion-->
<div class='container margen-container'>
    <div class="row-fluid" id='opinion'>
        <div class="span4">
            <?php if ( dynamic_sidebar('caricatura') ) : else : endif; ?>
        </div>


        <div class="span4">
            <h2>Opinion</h2>
            <?php if ( dynamic_sidebar('bloqueopinion') ) : else : endif; ?>
        </div>

        <div class="span4">
            <h2>Temas</h2>
        </div>
    </div>
</div>
<!-- Fin Opinion-->