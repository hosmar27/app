<?php
include("conecta.php");

if(isset($_POST['id_pacote'])) {
  $id_pacote_excluir = $_POST['id_pacote'];

  try {
    // Desativa temporariamente as restrições de chave estrangeira
    $pdo->exec("SET FOREIGN_KEY_CHECKS=0");

    $excluir_pedidos = $pdo->prepare("DELETE FROM pedido WHERE pacote_id = :id_pacote_excluir");
    $excluir_pedidos->bindParam(":id_pacote_excluir", $id_pacote_excluir);
    $excluir_pedidos->execute();

    $excluir_pacote = $pdo->prepare("DELETE FROM pacotes WHERE id = :id_pacote_excluir");
    $excluir_pacote->bindParam(":id_pacote_excluir", $id_pacote_excluir);
    $excluir_pacote->execute();

    echo "Pacote excluído com sucesso.";
  } catch(PDOException $e) {
    echo "Erro ao excluir o pacote: " . $e->getMessage();
  } finally {
    // Restaura as restrições de chave estrangeira
    $pdo->exec("SET FOREIGN_KEY_CHECKS=1");
  }
}
?>
