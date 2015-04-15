

<h1>Institución Educativa Federico Ozanam (<i><?php echo CHtml::encode(Yii::app()->name); ?></i>)	</h1>

<p class="lead">Aula virtual para estudiantes, manejo de notas, usuarios, docentes y clases tanto presenciales como virtuales.</p>


<div class="media well">


    <?php
    $cusos = new Cursos('serach');
    $this->widget('bootstrap.widgets.TbListView', array(
        'id' => 'list-evaluaciones-items',
        'dataProvider' => $cusos->search(),
        'itemView' => '_cursosInicio',
//        'sortableAttributes' => array(
//            'name',
//        ),
    ));
    ?>

</div>
