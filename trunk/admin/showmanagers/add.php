<?
	include('_controller.php');
	
	function sitm() { 
		global $BF;
?>
	<div class='innerbody'>
		<form action="" method="post" id="idForm" onsubmit="return error_check()">
			<table width="100%" class="twoCol" id="twoCol" cellpadding="0" cellspacing="0">
				<tr>
					<td class="tcleft">
<?					
						$q = "SELECT ID, CONCAT(chrLast,', ',chrFirst) AS chrRecord 
								FROM People 
								WHERE !bDeleted 
									AND idPersonStatus=3 
									AND !People.bAdmin 
									AND People.ID NOT IN (SELECT idPerson FROM ShowManagers WHERE !bDeleted AND idEvent='".$_SESSION['idEvent']."') 
									AND People.ID NOT IN (SELECT idPerson FROM ZoneManagers WHERE !bDeleted AND idEvent='".$_SESSION['idEvent']."') 
								ORDER BY chrLast, chrFirst";
						$results = db_query($q,"getting People");
?>
						<?=form_select($results,array('caption'=>'Manager Name','required'=>'true','name'=>'idPerson'))?>
						
					</td>
					<td class="tcgutter"></td>
					<td class="tcright">

						&nbsp;					

					</td>
				</tr>
			</table>
			<div class='FormButtons'>
				<?=form_button(array('type'=>'submit','value'=>'Add Another','extra'=>'onclick="document.getElementById(\'moveTo\').value=\'add.php\';"'))?> &nbsp;&nbsp; <?=form_button(array('type'=>'submit','value'=>'Add and Continue','extra'=>'onclick="document.getElementById(\'moveTo\').value=\'index.php\';"'))?>
				<?=form_text(array('type'=>'hidden','nocaption'=>'true','name'=>'moveTo'))?>
			</div>
		</form>
	</div>
<?
	}
?>