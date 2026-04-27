<?php include('layouts/header.php'); ?>

<?php

$data_nascimento = $_POST['data_nascimento'];
$data = new DateTime($data_nascimento);
$dia_mes = $data->format('d/m');

$signos = simplexml_load_file("signos.xml");

$signo_encontrado = null;

foreach ($signos->signo as $signo) {

    $inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
    $fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
    $nascimento = DateTime::createFromFormat('d/m', $dia_mes);

    // Ajuste para signos que viram o ano (Capricórnio)
    if ($inicio > $fim) {
        if ($nascimento >= $inicio || $nascimento <= $fim) {
            $signo_encontrado = $signo;
            break;
        }
    } else {
        if ($nascimento >= $inicio && $nascimento <= $fim) {
            $signo_encontrado = $signo;
            break;
        }
    }
}

?>

<?php if ($signo_encontrado): ?>

<div class="card p-4 shadow text-center">
<h2><?= $signo_encontrado->signoNome ?></h2>
<p><?= $signo_encontrado->descricao ?></p>

<a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
</div>

<?php else: ?>

<p>Signo não encontrado 😢</p>

<?php endif; ?>

</div>
</body>
</html>