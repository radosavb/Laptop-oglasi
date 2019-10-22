<head>
<?php
include_once './includes/head.php';
?>
<title>Laptopdrom | Oglas</title>
</head>

<?php
    
    include_once './config/database.php';
    include_once './includes/header.php';


    $database = new Database();
    $db = $database->connect();
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $oglas_id = $_GET['oglas_id'];

    $query = 'SELECT * FROM oglas WHERE oglas_id = :oglas_id';
    $stmt = $db->prepare($query);
    $stmt->execute(['oglas_id' => $oglas_id]);
    $oglas = $stmt->fetch();
    
    $user_id = $oglas->user_id;

    $query1 = 'SELECT * FROM korisnici WHERE user_id = :user_id';
    $stmt1 = $db->prepare($query1);
    $stmt1->execute(['user_id' => $user_id]);
    $korisnik = $stmt1->fetch();

?>  

<div class="container py-3">

    <div class="row py-3">
        <div class="col-md-4">
            <img class="img-thumbnail " src="assets/images/<?php echo $oglas->slika ?>">
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            
        <table id="tabela_pojedinacno" class="table table-sm table-striped w-100">
            <legend><?php echo $oglas->naziv ?></legend>
                <tr>
                    <td class="">Cena:</td>
                    <td class="text-danger h4 px-1"> <?php echo $oglas->cena ?> </td>
                </tr>
                <tr>
                    <td class="">Datum objave oglasa: </td>
                    <td class="text-primary font-italic px-1"> <?php $org_datum = $oglas->datum_oglasa; $novi_datum = date("d.m.Y", strtotime($org_datum)); echo $novi_datum; ?> </td>                    
                </tr>
                <tr>
                    <td class="">Procesor: </td>
                    <td class="font-italic px-1"> <?php echo $oglas->cpu . '<br>' . $oglas->cpu_opis ?> </td>                    
                </tr>
                <tr>
                    <td class="">RAM: </td>
                    <td class="px-1"> <?php echo $oglas->ram . ' GB <br>' . $oglas->tip_rama ?> </td>
                </tr>
                <tr>
                    <td class="">Graficka kartica: </td>
                    <td class="px-1"> <?php echo $oglas->gpu . '<br>' . $oglas->gpu_opis ?> </td>
                </tr>
                <tr>
                    <td class="">Ekran: </td>
                    <td class="px-1"> <?php echo $oglas->ekran . '"' . '<br>' . $oglas->ekran_opis ?> </td>
                </tr>
                <tr>
                    <td class="">HDD: </td>
                    <td class="px-1"> <?php if($oglas->hdd1 != "nema"){
                        echo $oglas->hdd1 . "  GB<br>" . $oglas->hdd1_opis ;
                        }else{
                            echo $oglas->hdd1 . " <br>" . $oglas->hdd1_opis;} ?> </td>
                </tr>
                <tr>
                    <td class="">SSD: </td>
                    <td class="px-1"> <?php if($oglas->hdd2 != "nema"){
                        echo $oglas->hdd2. "  GB<br>" . $oglas->hdd2_opis ;
                        }else{
                            echo $oglas->hdd2 . " <br>" . $oglas->hdd2_opis;} ?> </td>
                </tr>
                <tr>
                    <td class="">Operativni sistem: </td>
                    <td class="px-1"> <?php echo $oglas->os ?> </td>
                </tr>
                <tr>
                    <td class="">Garancija:</td>
                    <td class="px-1"> <?php echo $oglas->garancija . ' meseci' ?> </td>
                </tr>
                <tr>
                    <td class="">Lokacija: </td>
                    <td class="px-1"> <?php echo $oglas->lokacija ?> </td>
                </tr>
                <tr>
                    <td class="">Opis laptopa: </td>
                    <td class="px-1"> <?php echo $oglas->slob_opis ?> </td>
                </tr>
            </table>
        </div>

        <div class="col-md-5">
        <table id="tabela_korisnik" class="table table-sm table-striped w-100">
        <legend>Podaci o prodavcu</legend>
            <tr>
                <td class="">Ime:</td>
                <td class="font-weight-bold px-1"> <?php echo $korisnik->ime ?> </td>
            </tr>
            <tr>
                <td class="">Prezime: </td>
                <td class="font-weight-bold px-1"> <?php echo $korisnik->prezime ?> </td>                    
            </tr>
            <tr>
                <td class="">Broj telefona: </td>
                <td class="px-1"> <?php echo "0" . $korisnik->tel ?> </td>
            </tr>
            <tr>
                <td class="">Član od: </td>
                <td class="px-1"> <?php $org_datum = $korisnik->created; $novi_datum = date("d.m.Y", strtotime($org_datum)); echo $novi_datum;?> </td>
            </tr>

        </table>
        </div>
    </div>

</div>

<?php
include_once './includes/footer.php';
?>