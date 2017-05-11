<?php
echo $this->Html->css('modal.css');
?>

<section class="report-user">

<?php



    echo $this->Ajax->link("Busqueda por grupo", array('controller' => "ConvocationCharges", "action" => "search"), 
                          array(  
                          'update' => 'searchc',
                          'complete' => '$("#search-convo").modal("show")',
                          'class' => 'btn btn-info btn-sm',
                          'type' => 'synchronous'
                           )
                          );
                        ?>
    <?php
//    var_dump($personas);
//                echo "<br>";
//                echo "<br>";
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4> Reporte </h4>
                </div>
                <div class="dataTable_wrapper">
                    <h5><center><strong>Información de la convocatoria</strong></center></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th><center>Grupo</center></th>
                        <th><center>Denominación Cargo</center></th>
                        <th><center>Código</center></th>
                        <th><center>Grado</center></th>
                        <th><center>Vacantes</center></th>
                        <th><center>Total inscritos</center></th>

                        </tr>

                        <tbody>
                            <tr>
                                <td><center><?php echo $datosCargo['ConvocationCharge']['IDCONVOCATORIA'];?></center></td>
                                <td><center><?php echo $datosCargo['Charge']['CARGO'];?></center></td>
                                <td><center><?php echo $datosCargo['Charge']['CODIGO'];?></center></td>
                                <td><center><?php echo $datosCargo['Charge']['GRADO'];?></center></td>
                                <td><center><?php echo $datosCargo['Charge']['VACANTES'];?></center></td>
                                <td><center><?php echo count($personas); ?></center></td>
                            </tr>

                    </table>

                    <h5><center><strong> Documentos personales</strong></center></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><center>Posición</center></th>
                                <th><center>Documento</center></th>
                                <th><center>Nombre</center></th>
                                <th><center>Fecha</center></th>
                                <th><center>Estado</center></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><center>Posición</center></th>
                                <th><center>Documento</center></th>
                                <th><center>Nombre</center></th>
                                <th><center>Fecha</center></th>
                                <th><center>Estado</center></th>
                            </tr>
                        <tr>
                            <th colspan="7" class="ts-pager form-horizontal">
                                <button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
                                <button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
                                <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                                <button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
                                <button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
                                <select class="pagesize input-mini" title="Select page size">
                                    <option selected="selected" value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                <select class="pagenum input-mini" title="Select page number"></select>
                            </th>
                        </tr>
                        </tfoot>

                        <tbody>
                            <?php  foreach ($personas as $aspirantes): ?>
                            <tr>
                                <td><center><?php echo $aspirantes['Inscription']['IDINSCRIPCION'];?></center></td>
                                <td>
                                    <center>
                                        <?php
                                        echo $this->html->link($aspirantes['Inscription']['NRODOCUMENTO'], array('controller' => "Candidates", "action" => "report", $aspirantes['Inscription']['NRODOCUMENTO']));
                                        ?>
                                    </center>
                                </td>
                                <td><font style="text-transform: uppercase;"><?php echo $aspirantes['Candidate']['PRIMERNOMBRE']," ", $aspirantes['Candidate']['SEGUNTONOMBRE'] ," ", $aspirantes['Candidate']['PRIMERAPELLIDO']," ", $aspirantes['Candidate']['SEGUNDOAPELLIDO'];?></font></td>
                                <td><center><?php echo $aspirantes['Inscription']['FECHAINSCRIPCION'];?></center></td>
                                <td><center><?php echo $aspirantes['Inscription']['FECHAINSCRIPCION'] ? "FINALIZADO":"PROCESO";?></center></td>
                            </tr>
                            <?php  endforeach; ?>
                            
                        </tbody>
                    </table>




                     



            <?php  
//                var_dump($candidate);
//                echo "<br>";
//                echo "<br>";
//                var_dump($documentEducations);
//                echo "<br>";
//                echo "<br>";
//                var_dump($documentExperiences);
//                echo "<br>";
//                echo "<br>";
//                var_dump($documents);
            ?>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width: 60%">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div id="banner" align="center"><?php echo $this->Html->image('bannercal.png', array('width'=>'600','height'=>'auto')) ?> </div>
            </div>


            <!-- -->

            <div class="modal-body" id="loadedit">

            </div>

            <!-- -->


        </div>
    </div>
</div>

<div class="modal fade" id="concept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width: 60%">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div id="banner" align="center"><?php echo $this->Html->image('concepto.png', array('width'=>'600','height'=>'auto')) ?> </div>
            </div>


            <!-- -->

            <div class="modal-body" id="loadconcept">

            </div>

            <!-- -->


        </div>
    </div>
</div>


<div class="modal fade" id="search-convo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width: 30%">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div id="banner"><?php echo $this->Html->image('searchgroups.png', array('width'=>'300','height'=>'auto')) ?></div>
            </div>
            <div class="modal-body" id="searchc">

            </div>
        </div>
    </div>
</div>