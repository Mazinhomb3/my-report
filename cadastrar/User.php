<?php
function readUserDb($conexao) {
    $users = [];

	$sql = "SELECT * FROM tbl_login_sup";
	$result = mysqli_query($conexao, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conexao);
	return $users;
}
?>