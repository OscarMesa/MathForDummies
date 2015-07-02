

    <div class="contenido-evaluacion bs-docs-contenidos">
        <div class="titulo">
            <h4><?php echo $data->titulo; ?></h4>
        </div>
        <div class="detalle">
            <?php echo ($data->detalle); ?>
        </div>

        <div id="doc_adj_contenido_<?php echo $data->id; ?>" class="adjuntos-evaluacion">
            <?php
            $dataScript = "data = [{
                        id: 'adjuntos-contenido-$data->id',
                        name: 'Documentos Adjuntos',
                        type: 'dir',
                        children: [
                        ";
            $i = 1;
            foreach ($data->documentosAdjuntoses as $adjunto) {
                $dataScript .= ""
                        . "{"
                        . "id: 'file-$i',
                            name: '$adjunto->nom_original_doc_adj'                            
,                           type: '$adjunto->extension_doc_adj',"
                        . " url: '".Yii::app()->createAbsoluteUrl('contenidos/descargaDocumento',array('id'=>$adjunto->id_doc_adj))."',
                            "
                        . "},";
            }
            $dataScript .= "]}]";
            ?>
        </div>
    </div>

<?php  Yii::app()->clientScript->registerScript('registroDeAdjuntos'.$data->id,''
        . '$("#doc_adj_contenido_'.$data->id.'").fileTree({
            data: '.$dataScript.'
        });');?>