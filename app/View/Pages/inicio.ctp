<html>
<head>
</head>

<body>
    <div style="float:left;height:200px;">
<br />
<br />
<br />
<br />
<br />
<br />
<br />
        <table>
            <tr>
                <td>
                <?php echo $this->Html->link(__('Inscripcion Asistentes'), array('controller'=>'registroasistentes','action' => 'add')); ?>
                <br />
                <br />
                <?php echo $this->Html->link(__('Inscripcion Ponentes'), array('controller'=>'registroponentes','action' => 'add')); ?>
                 <br />
                <br />
                <?php echo $this->Html->link(__('Administracion'), array('controller'=>'users','action' => 'login')); ?>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin:0 auto 0 auto; width:550px;text-align:right;font-size:18px;font-weight: bold;  " >
        <h1> TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC</h1>
    </div>  
    <div style="margin:0 auto 0 auto; width:450px;text-align:right;" >
                <?php
                    echo $this->Html->image('BADNXSBWD5812.gif', array('fullBase' => true, 'align' => 'center'));
                ?>
    </div>
</body>
</html>

