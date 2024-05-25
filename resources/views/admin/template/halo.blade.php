<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
  <button type="button" class="btn btn-warning " onclick="pilihDokter('cekkk')">Pilih Dokter</button>
  <input type="text" class="form-control input_plus_button" id="input_namadokter" placeholder="Masukan Nama Dokter" aria-describedby="defaultFormControlHelp" />
  <script>
    function pilihDokter(namaDokter) {
  document.getElementById("input_namadokter").value = namaDokter;
}
  </script>
</body>
</html>