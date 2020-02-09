<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Reportes extends CI_Controller {
function index(){
    if ($_SESSION['tipo']==""){
        header("Location: ".base_url());
    }
    $this->load->view('templates/header');
    $this->load->view('reportes');
    $this->load->view('templates/footer');
}
function generar(){
    $mes=$_POST['mes'];
    $anio=$_POST['anio'];
    $mest = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'MES');
    $sheet->setCellValue('A2', $mest[$mes-1]);
    $sheet->setCellValue('B2', $anio);
    $sheet->setCellValue('A3', 'Fecha');
    $sheet->setCellValue('B3', 'Turno');

    $sheet->setCellValue('C2', 'CAL HIDRATADA');
    $sheet->setCellValue('C3', 'Std Inic.');
    $sheet->setCellValue('D3', 'Ingreso');
    $sheet->setCellValue('E3', 'Salida');
    $sheet->setCellValue('F3', 'Std final');

    $sheet->setCellValue('H2', 'FLOCULANTE 933');
    $sheet->setCellValue('H3', 'Std Inic.');
    $sheet->setCellValue('I3', 'Ingreso');
    $sheet->setCellValue('J3', 'Salida');
    $sheet->setCellValue('K3', 'Std final');

    $sheet->setCellValue('M2', 'COAGULANTE 958');
    $sheet->setCellValue('M3', 'Std Inic.');
    $sheet->setCellValue('N3', 'Ingreso');
    $sheet->setCellValue('O3', 'Salida');
    $sheet->setCellValue('P3', 'Std final');

    $sheet->setCellValue('R2', 'ACIDO SULFURICO');
    $sheet->setCellValue('R3', 'Std Inic.');
    $sheet->setCellValue('S3', 'Ingreso');
    $sheet->setCellValue('T3', 'Salida');
    $sheet->setCellValue('U3', 'Std final');

    $sheet->setCellValue('W2', 'SAL');
    $sheet->setCellValue('W3', 'Std Inic.');
    $sheet->setCellValue('X3', 'Ingreso');
    $sheet->setCellValue('Y3', 'Salida');
    $sheet->setCellValue('Z3', 'Std final');

    $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $anio); // 31
$cont=1;
    for ($i=1;$i<=$dias;$i++){
        $sheet->setCellValue('A'.(int)($cont+4), $i);
        $sheet->setCellValue('B'.(int)($cont+4), '22 a 06');
        $sheet->setCellValue('B'.(int)($cont+5), '06 a 14');
        $sheet->setCellValue('B'.(int)($cont+6), '14 a 22' );
        //22 a 06
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='CAL HIDRATADA' AND dia='$anio-$mes-$i' AND turno='22 a 06' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('C'.(int)($cont+4), $query->row()->stdinicio);
            $sheet->setCellValue('D'.(int)($cont+4), $query->row()->ingreso);
            $sheet->setCellValue('E'.(int)($cont+4), $query->row()->salida);
            $sheet->setCellValue('F'.(int)($cont+4), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='FLOCULANTE 933' AND dia='$anio-$mes-$i' AND turno='22 a 06' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('H'.(int)($cont+4), $query->row()->stdinicio);
            $sheet->setCellValue('I'.(int)($cont+4), $query->row()->ingreso);
            $sheet->setCellValue('J'.(int)($cont+4), $query->row()->salida);
            $sheet->setCellValue('K'.(int)($cont+4), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='COAGULANTE 958' AND dia='$anio-$mes-$i' AND turno='22 a 06' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('M'.(int)($cont+4), $query->row()->stdinicio);
            $sheet->setCellValue('N'.(int)($cont+4), $query->row()->ingreso);
            $sheet->setCellValue('O'.(int)($cont+4), $query->row()->salida);
            $sheet->setCellValue('P'.(int)($cont+4), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='ACIDO SULFURICO' AND dia='$anio-$mes-$i' AND turno='22 a 06' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('R'.(int)($cont+4), $query->row()->stdinicio);
            $sheet->setCellValue('S'.(int)($cont+4), $query->row()->ingreso);
            $sheet->setCellValue('T'.(int)($cont+4), $query->row()->salida);
            $sheet->setCellValue('U'.(int)($cont+4), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='SAL' AND dia='$anio-$mes-$i' AND turno='22 a 06' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('W'.(int)($cont+4), $query->row()->stdinicio);
            $sheet->setCellValue('X'.(int)($cont+4), $query->row()->ingreso);
            $sheet->setCellValue('Y'.(int)($cont+4), $query->row()->salida);
            $sheet->setCellValue('Z'.(int)($cont+4), $query->row()->stdfinal);
        }
        //06 a 14
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='CAL HIDRATADA' AND dia='$anio-$mes-$i' AND turno='06 a 14' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('C'.(int)($cont+5), $query->row()->stdinicio);
            $sheet->setCellValue('D'.(int)($cont+5), $query->row()->ingreso);
            $sheet->setCellValue('E'.(int)($cont+5), $query->row()->salida);
            $sheet->setCellValue('F'.(int)($cont+5), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='FLOCULANTE 933' AND dia='$anio-$mes-$i' AND turno='06 a 14' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('H'.(int)($cont+5), $query->row()->stdinicio);
            $sheet->setCellValue('I'.(int)($cont+5), $query->row()->ingreso);
            $sheet->setCellValue('J'.(int)($cont+5), $query->row()->salida);
            $sheet->setCellValue('K'.(int)($cont+5), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='COAGULANTE 958' AND dia='$anio-$mes-$i' AND turno='06 a 14' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('M'.(int)($cont+5), $query->row()->stdinicio);
            $sheet->setCellValue('N'.(int)($cont+5), $query->row()->ingreso);
            $sheet->setCellValue('O'.(int)($cont+5), $query->row()->salida);
            $sheet->setCellValue('P'.(int)($cont+5), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='ACIDO SULFURICO' AND dia='$anio-$mes-$i' AND turno='06 a 14' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('R'.(int)($cont+5), $query->row()->stdinicio);
            $sheet->setCellValue('S'.(int)($cont+5), $query->row()->ingreso);
            $sheet->setCellValue('T'.(int)($cont+5), $query->row()->salida);
            $sheet->setCellValue('U'.(int)($cont+5), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='SAL' AND dia='$anio-$mes-$i' AND turno='06 a 14' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('W'.(int)($cont+5), $query->row()->stdinicio);
            $sheet->setCellValue('X'.(int)($cont+5), $query->row()->ingreso);
            $sheet->setCellValue('Y'.(int)($cont+5), $query->row()->salida);
            $sheet->setCellValue('Z'.(int)($cont+5), $query->row()->stdfinal);
        }
        //14 a 22
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='CAL HIDRATADA' AND dia='$anio-$mes-$i' AND turno='14 a 22' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('C'.(int)($cont+6), $query->row()->stdinicio);
            $sheet->setCellValue('D'.(int)($cont+6), $query->row()->ingreso);
            $sheet->setCellValue('E'.(int)($cont+6), $query->row()->salida);
            $sheet->setCellValue('F'.(int)($cont+6), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='FLOCULANTE 933' AND dia='$anio-$mes-$i' AND turno='14 a 22' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('H'.(int)($cont+6), $query->row()->stdinicio);
            $sheet->setCellValue('I'.(int)($cont+6), $query->row()->ingreso);
            $sheet->setCellValue('J'.(int)($cont+6), $query->row()->salida);
            $sheet->setCellValue('K'.(int)($cont+6), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='COAGULANTE 958' AND dia='$anio-$mes-$i' AND turno='14 a 22' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('M'.(int)($cont+6), $query->row()->stdinicio);
            $sheet->setCellValue('N'.(int)($cont+6), $query->row()->ingreso);
            $sheet->setCellValue('O'.(int)($cont+6), $query->row()->salida);
            $sheet->setCellValue('P'.(int)($cont+6), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='ACIDO SULFURICO' AND dia='$anio-$mes-$i' AND turno='14 a 22' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('R'.(int)($cont+6), $query->row()->stdinicio);
            $sheet->setCellValue('S'.(int)($cont+6), $query->row()->ingreso);
            $sheet->setCellValue('T'.(int)($cont+6), $query->row()->salida);
            $sheet->setCellValue('U'.(int)($cont+6), $query->row()->stdfinal);
        }
        $query=$this->db->query("SELECT * FROM kardex WHERE tipo='SAL' AND dia='$anio-$mes-$i' AND turno='14 a 22' ");
        if($query->num_rows()>0){
            $sheet->setCellValue('W'.(int)($cont+6), $query->row()->stdinicio);
            $sheet->setCellValue('X'.(int)($cont+6), $query->row()->ingreso);
            $sheet->setCellValue('Y'.(int)($cont+6), $query->row()->salida);
            $sheet->setCellValue('Z'.(int)($cont+6), $query->row()->stdfinal);
        }


        $cont=$cont+3;
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save("$mes-$anio.xlsx");

    header("Content-disposition: attachment; filename=$mes-$anio.xlsx");
    header("Content-type: application/xlsx");
    readfile("$mes-$anio.xlsx");
}
}
