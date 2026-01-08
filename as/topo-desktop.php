<div id="sistemas-azul">
		
<?php
$sql = "SELECT * FROM img_adm WHERE categoria ='logotipo_principal' ORDER BY id DESC  LIMIT 1 ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$imgname= $res['imgname']; 
$empresa= $res['empresa']; 	
$data_cadastro= $res['data_cadastro'];	
echo"<div class=\"sistemas-logo\"><a href=\"sistema\"><img src=\"img2/img_adm/$imgname\" width=\"100%\"/></a></div>";}?>	
	
	

</div>

<div id="sistemas-icons">
<div class="sistemas-icons-img"><a href="index.php?logout=true" title="Sair do Sistema"><img src="img/sair.png"/></a></div>
<div class="sistemas-icons-img" style="display: none;"><img src="img/configuracao.png"/></div>
<div class="sistemas-icons-img"><a href="http://www.asweb.com.br" target="_blank" title="As Web Design"><img src="img/asweb.png"/></a></div>
</div>