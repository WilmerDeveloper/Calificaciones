<?php

echo $this->Html->css('modal.css');
?>
<?php //echo $candidate['Candidate']['NRODOCUMENTO'];?>
<section class="report-user">
<?php
                            echo $this->Ajax->link("Busqueda por aspirante", array('controller' => "Candidates", "action" => "search"), 
                                            array(  
                                            'update' => 'loadsearch',
                                            'complete' => '$("#search").modal("show")',
                                            'class' => 'btn btn-info btn-sm',
                                            'type' => 'synchronous'
                                            )
                                        );
                        ?> 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4> Reporte </h4>
                </div>
                <div class="dataTable_wrapper">
                    <h5><center><strong> Datos personales</strong></center></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th><center>Documento</center></th>
                        <th><center>Nombre Completo</center></th>
                        <th><center>E-mail</center></th>
                        <th><center>Fecha de nacimiento</center></th>
                        <th><center>Discapacidad</center></th>

                        </tr>

                        <tbody>
                            <tr>
                                <td><?php echo $candidate['Candidate']['NRODOCUMENTO'];?> </td>
                                <td><?php echo $candidate['Candidate']['PRIMERNOMBRE']," ", $candidate['Candidate']['SEGUNTONOMBRE'] ," ", $candidate['Candidate']['PRIMERAPELLIDO']," ", $candidate['Candidate']['SEGUNDOAPELLIDO']; ?></td>
                                <td><?php echo $candidate['Candidate']['CORREOELECTRONICO'];?></td>
                                <td><?php echo $candidate['Candidate']['FECHANACIMIENTO'];?></td>
                                <td><?php echo $candidate['Candidate']['DISCAPACIDAD'];?></td>
                            </tr>
                        </tbody>
                        <tr>
                            <th><center>Departamento</center></th>
                        <th><center>Ciudad</center></th>
                        <th><center>Dirección</center></th>
                        <th><center>Teléfono</center></th>
                        <th><center>Estado</center></th>

                        </tr>

                        <tbody>
                            <tr>
                                <td><?php // echo $candidate['Candidate']['DEPARTAMENTO'];?> </td>
                                <td><?php echo $candidate['Candidate']['MUNICIPIO']; ?></td>
                                <td><?php echo $candidate['Candidate']['DIRECCIONRESIDENCIA'];?></td>
                                <td><?php echo $candidate['Candidate']['TELEFONO'];?></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <h5><center><strong> Documentos personales</strong></center></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th><center>Documento</center></th>
                        <th><center>Soporte</center></th>
                        <th><center>Concepto</center></th>
                        <th><center>Justificación</center></th>
                        <th><center>Calificar</center></th>


                        </tr>

                        <tbody>
                            <?php foreach ($documents as $documentos): ?>
                            <tr>
                                <td><?php echo $documentos['TypeDocument']['DOCUMENTO'];?> </td>
                                <td>
                                    <a href="http://192.168.1.96:85/ASPIRANTE/DescargarArchivo?URLArchivo=E:\DOCUMENTOS_ASPIRANTES\<?php echo $candidate['Candidate']['NRODOCUMENTO'];?>\<?php echo $documentos['Document']['DOCUMENTO'];?>">
                                        <center><span class="glyphicon glyphicon-search"></span></center>
                                    </a>
                                </td>
                                <td><?php echo $documentos['Document']['NIVELCUMPLIMIENTO'];?></td>
                                <td><?php echo $documentos['Document']['JUSTIFICACION'];?></td>
                                <td>
                        <center>


                <?php
                echo $this->Ajax->link("", array('controller' => "Documents", "action" => "edit", $documentos['Document']['IDDOCUMENTOASPIRANTE']), 
                                            array(  
                                            'update' => 'loadedit',
                                            'complete' => '$("#edit1").modal("show")',
                                            'class' => 'btn btn-success fa fa-pencil',
                                            'type' => 'synchronous'
                                            )
                                        );
                
                ?>
                        </center>
                        </td>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                    <h5><center><strong> Información de estudios</strong></center></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                        <th><center>Nivel educativo</center></th>
                        <th><center>Nombre de la Institucion</center></th>
                        <th><center>Programa</center></th>
                        <th><center>Graduado</center></th>
                        <th><center>Fecha de terminacion de materias</center></th>
                        <th><center>Fecha de grado</center></th>
                        <th><center>Soporte</center></th>
                        <th><center>Concepto</center></th>
                        <th><center>Justificación</center></th>
                        <th><center>Calificar</center></th>
                        </tr>
                       
                        

                        <tbody>
                            <?php foreach ($documentEducations as $educacion): ?>
                            <tr>
                                <td><?php echo $educacion['LevelEducation']['NIVEL'];?> </td>
                                <td><?php echo $educacion['DocumentEducation']['NOMBREINSTITUCIONUNIVERSITARIA'];?></td>
                                <td><?php echo $educacion['DocumentEducation']['PROGRAMA'];?></td>
                                <td><center><?php echo $educacion['DocumentEducation']['GRADUADO'] ? "Si":"No";?></center></td>
                                <td><?php echo $educacion['DocumentEducation']['FECHATERMINACION'];?></td>
                                <td><?php echo $educacion['DocumentEducation']['FECHAGRADO'];?></td>
                                <td>
                                    <a href="http://192.168.1.96:85/ASPIRANTE/DescargarArchivo?URLArchivo=E:\DOCUMENTOS_ASPIRANTES\<?php echo $candidate['Candidate']['NRODOCUMENTO'];?>\<?php echo $educacion['DocumentEducation']['DOCUMENTO'];?>">
                                        <center><span class="glyphicon glyphicon-search"></span></center>
                                    </a>
                                </td>
                                <td><?php echo $educacion['DocumentEducation']['NIVELCUMPLIMIENTO'];?></td>
                                <td><?php echo $educacion['DocumentEducation']['JUSTIFICACION'];?></td>
                                <td>
                        <center>
                                        <?php
                                        echo $this->Ajax->link("", array('controller' => "DocumentEducations", "action" => "edit", $educacion['DocumentEducation']['IDEDUCACIONASPIRANTE']), 
                                                                    array(  
                                                                    'update' => 'loadedit',
                                                                    'complete' => '$("#edit1").modal("show")',
                                                                    'class' => 'btn btn-success fa fa-pencil',
                                                                    'type' => 'synchronous'
                                                                    )
                                                                );

                                        ?>
                        </center>
                        </td>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <h5><center><strong> Información de experiencia</strong></center></h5>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>

                        <th><center>Empresa</center></th>
                        <th><center>Cargo</center></th>
                        <th><center>Actual</center></th>
                        <th><center>Fecha de ingreso</center></th>
                        <th><center>Fecha de salida</center></th>
                        <th><center>Soporte</center></th>
                        <th><center>Concepto</center></th>
                        <th><center>Justificación</center></th>
                        <th><center>Calificar</center></th>


                        </tr>

                        <tbody>
                            <?php foreach ($documentExperiences as $experiencia): ?>
                            <tr>
                                <td><?php echo $experiencia['DocumentExperience']['EMPRESA'];?> </td>
                                <td><?php echo $experiencia['DocumentExperience']['CARGO'];?></td>
                                <td><center><?php echo $experiencia['DocumentExperience']['ACTUAL'] ? "Si" : "No" ;?></center></td>
                                <td><?php echo $experiencia['DocumentExperience']['FECHAINGRESO'];?> </td>
                                <td><?php echo $experiencia['DocumentExperience']['FECHASALIDA'];?></td>
                                <td>
                                    <a href="http://192.168.1.96:85/ASPIRANTE/DescargarArchivo?URLArchivo=E:\DOCUMENTOS_ASPIRANTES\<?php echo $candidate['Candidate']['NRODOCUMENTO'];?>\<?php echo $experiencia['DocumentExperience']['DOCUMENTO'];?>">
                                        <center><span class="glyphicon glyphicon-search"></span></center>
                                    </a>
                                </td>
                                <td><?php echo $experiencia['DocumentExperience']['NIVELCUMPLIMIENTO'];?></td>
                                <td><?php echo $experiencia['DocumentExperience']['JUSTIFICACION'];?></td>
                                <td>
                                    <center>
                                        <?php
                                        echo $this->Ajax->link("", array('controller' => "DocumentExperiences", "action" => "edit", $experiencia['DocumentExperience']['IDEXPERIENCIALABORAL']), 
                                                                    array(  
                                                                    'update' => 'loadedit',
                                                                    'complete' => '$("#edit1").modal("show")',
                                                                    'class' => 'btn btn-success fa fa-pencil',
                                                                    'type' => 'synchronous'
                                                                    )
                                                                );
                                        ?>
                                    </center>
                                </td>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <center>


                <?php
                echo $this->Ajax->link(" Calificar aspirante", array('controller' => "Candidates", "action" => "edit", $candidate['Candidate']['NRODOCUMENTO']), 
                                            array(  
                                            'update' => 'loadconcept',
                                            'complete' => '$("#concept").modal("show")',
                                            'class' => 'btn btn-success fa fa-pencil',
                                            'type' => 'synchronous'
                                            )
                                        );
                
                ?>
                    </center>        



            
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

<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 30%">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div id="banner"><?php echo $this->Html->image('searchpeople.png', array('width'=>'300','height'=>'auto')) ?></div>
            </div>
                    <div class="modal-body" id="loadsearch">

                    </div>
        </div>
    </div>
</div>