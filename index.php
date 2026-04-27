<?php include('layouts/header.php'); ?>

<h1 class="text-center mb-4">Descubra seu signo 🔮</h1>

<form method="POST" action="show_zodiac_sign.php" class="card p-4 shadow">

<div class="mb-3">
<label class="form-label">Data de nascimento</label>
<input type="date" name="data_nascimento" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary w-100">
Descobrir signo
</button>

</form>

</div>
</body>
</html>