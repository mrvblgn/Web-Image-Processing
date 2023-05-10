<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Görüntü İşleme</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
</head>
<body>
    <?php
        if (isset($_POST["gonder"]))
        {
            $source = $_FILES['resim']['tmp_name'];
            $destination = "/Applications/XAMPP/xamppfiles/htdocs/web_goruntu_isleme/".$_FILES['resim']['name'];
            copy($source, $destination);
            if ($_POST["genislik"] != ""){
                $command = 'python3 boyutlandir.py'.$_FILES['resim']['name'].' '. 
                        $_POST["genislik"].' '.$_POST["yukseklik"];
                exec($command, $out, $status);
                $imgData = base64_encode(file_get_contents($_FILES['resim']['name']));
                $src = 'data: ' .mime_content_type($img_file).';base64,'.imgData;
                echo "<img src='".$FILES['resim']['name']."'>";
                unlink($_FILES['resim']['name']);
            }
            
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Fotoğrafı Buraya Yükleyin</label>
                    <input class="form-control" type="file" name="resim" multiple>
                </div>
            </div>
            <div class="row">
                <h2>Boyut</h2>
                <div class="col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">Genişlik</label>
                    <input type="number" name="genislik" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">Yükseklik</label>
                    <input type="number" name="yukseklik" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <h2>Kırpma</h2>
                <div class="col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">x1</label>
                    <input type="number" name="x1" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">y1</label>
                    <input type="number" name="y1" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">x2</label>
                    <input type="number" name="x2" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">y2</label>
                    <input type="number" name="y2" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <h2>Döndürme</h2>
                <div class="col-md-3">
                    <select class="form-select" id="validationCustom04">
                      <option selected disabled value="">Seçiniz...</option>
                      <option>Saat Yönünde 90° Döndür</option>
                      <option>Saatin Tersi Yönünde 90° Döndür</option>
                      <option>180° Döndür</option>
                    </select>
                    <div class="invalid-feedback">
                      Lütfen geçerli bir değer giriniz
                    </div>
                  </div>
            </div>
            <br>
            <div class="row">
                <h2>Çevirme</h2>
                <div class="col-md-3">
                    <select class="form-select" id="validationCustom04">
                      <option selected disabled value="">Seçiniz...</option>
                      <option>Yatay Çevir</option>
                      <option>Dikey Çevir</option>
                      <option>Her İki Yönde Çevir</option>
                    </select>
                    <div class="invalid-feedback">
                      Lütfen geçerli bir değer giriniz
                    </div>
                  </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="gonder">İşlemi Yap</button>
                 </div>
            </div>
        </div>
        
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</body>
</html>