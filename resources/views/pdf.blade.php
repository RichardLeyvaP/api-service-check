<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<table width="100%" height="100%" style="border-collapse: collapse; border: 1.5px solid black">
<tr height="10%" style="border-collapse: collapse; background-color: rgba(0, 0, 0, 0.1); border: 1.5px solid black">
    <td colspan="9" >
    <p><img src="{{ storage_path('/img/prueba.png') }}" alt="Logo" style="float: right; background-size: cover; width: 50px; height: 50px; margin-top: 1px;"/></p>
      
      <p style="size:24px;text-align: center;"><strong>RELATORIO DE AFERICAO E CALIBRACAO </strong></p>
    </td>
  </tr>
  <tr style="border-collapse: collapse; background-color: rgba(0, 0, 0, 0.1); border: 1.5px solid black">
    <td colspan="9" style="text-align: center;"><strong>DATOS DU CLIENTES </strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9"><strong>EMPRESA: </strong>{{ $data['branchName'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="5"  style="border-collapse: collapse; border: 1px solid"><strong>CIDADE/ESTADO:</strong>{{ $data['cityState'] }}</td>
    <td colspan="4" style="border-collapse: collapse; border: 1px solid"><strong>CONTATO:</strong> {{ $data['contact'] }} </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9" style="text-align: center;"><strong>DADOS DU INTRUMENTO </strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9"><strong>Nro. RELATORIO:</strong> {{ $data['numberRelatorie'] }} </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="4"  style="border-collapse: collapse; border: 1px solid"><strong>TAP: </strong>{{ $data['tag'] }}</td>
    <td colspan="5"  style="border-collapse: collapse; border: 1px solid"><strong>FABRICANTE: </strong>{{ $data['fabricante'] }}</td>
  </tr>
  <tr>
    <td colspan="9"><strong>DESCRICAO: </strong>{{ $data['direction'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9"><strong>FUNCAO NO PROCESSO:</strong> {{ $data['functionProceso'] }} </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9"><strong>FAIXA DE CALIBRACAO:</strong>  </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9"><strong>VARIAVEL MEDIDA:</strong> {{ $data['medida'] }} </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="4"  style="border-collapse: collapse; border: 1px solid"><strong>F.R.E:</strong> {{ $data['fre'] }} </td>
    <td colspan="5"  style="border-collapse: collapse; border: 1px solid"><strong>DATA CALIBRACAO:</strong> {{ $data['dataCalibration'] }} </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9"><strong>DATA PROX CALIBRACAO:</strong> {{ $data['dataNextCalibration'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; background-color: rgba(0, 0, 0, 0.1); border: 1.5px solid black">
    <td colspan="9" style="text-align: center;"><strong>AFERICAO/CALIBRACAO</strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td width="20%" colspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Referencia</strong></td>
    <td width="80%" colspan="7" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Ascendente</strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td width="10%" rowspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>%</strong></td>
    <td width="10%" rowspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>mA</strong></td>
    <td width="20%" height="15px" rowspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Pressao aplicada (kgf/cm2)</strong></td>
    <td width="20%" colspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Teste 1 </strong></td>
    <td width="20%" colspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Teste 2 </strong></td>
    <td width="20%" colspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Teste 3 </strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td  style="border-collapse: collapse; border: 1px solid"><strong>Instrum.</strong></td>
    <td  style="border-collapse: collapse; border: 1px solid"><strong>Padrao</strong></td>
    <td  style="border-collapse: collapse; border: 1px solid"><strong>Instrum.</strong></td>
    <td  style="border-collapse: collapse; border: 1px solid"><strong>Padrao</strong></td>
    <td  style="border-collapse: collapse; border: 1px solid"><strong>Instrum.</strong></td>
    <td  style="border-collapse: collapse; border: 1px solid"><strong>Padrao</strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">25</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">50</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">75</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">100</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td width="20%" colspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Referencia</strong></td>
    <td width="80%" colspan="7" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Descendente</strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td width="10%" rowspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>%</strong></td>
    <td width="10%" rowspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>mA</strong></td>
    <td width="20%" height="15px" rowspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Pressao aplicada (kgf/cm2)</strong></td>
    <td width="20%" colspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Teste 1 </strong></td>
    <td width="20%" colspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Teste 2 </strong></td>
    <td width="20%" colspan="2" style="text-align: center; border-collapse: collapse; border: 1px solid"><strong>Teste 3 </strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="border-collapse: collapse; border: 1px solid"><strong>Instrum.</strong></td>
    <td style="border-collapse: collapse; border: 1px solid"><strong>Padrao</strong></td>
    <td style="border-collapse: collapse; border: 1px solid"><strong>Instrum.</strong></td>
    <td style="border-collapse: collapse; border: 1px solid"><strong>Padrao</strong></td>
    <td style="border-collapse: collapse; border: 1px solid"><strong>Instrum.</strong></td>
    <td style="border-collapse: collapse; border: 1px solid"><strong>Padrao</strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">100</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada100'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">75</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada75'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">50</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada50'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">25</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">{{ $data['aplicada25'] }}</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1.5px solid black">
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">-</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
    <td style="text-align: center; border-collapse: collapse; border: 1px solid">0,00</td>
  </tr>
  <tr style="border-collapse: collapse; background-color: rgba(0, 0, 0, 0.1); border: 1.5px solid black">
    <td colspan="9" style="text-align: center;">PADROES UTILIZADOS </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="5" style="border-collapse: collapse; border: 1px solid"><strong>Instrumento padrao:</strong> {{ $data['instrumentPadrao'] }} </td>
    <td colspan="4" style="border-collapse: collapse; border: 1px solid"><strong>Modelo:</strong> {{ $data['model'] }} </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="4" style="border-collapse: collapse; border: 1px solid"><strong>Certificado: </strong>{{ $data['certificado'] }} </td>
    <td colspan="5" style="border-collapse: collapse; border: 1px solid"><strong>Data afericao: </strong>{{ $data['dateAferica'] }} </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="5" style="border-collapse: collapse; border: 1px solid"><strong>Instrumento padrao:</strong> - </td>
    <td colspan="4" style="border-collapse: collapse; border: 1px solid"><strong>Modelo:</strong> - </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="4" style="border-collapse: collapse; border: 1px solid"><strong>Certificado: </strong>-</td>
    <td colspan="5" style="border-collapse: collapse; border: 1px solid"><strong>Data afericao: </strong>-</td>
  </tr>  
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="5" style="border-collapse: collapse; border: 1px solid"><strong>Instrumento padrao:</strong> - </td>
    <td colspan="4" style="border-collapse: collapse; border: 1px solid"><strong>Modelo:</strong> - </td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="4" style="border-collapse: collapse; border: 1px solid"><strong>Certificado: </strong>-</td>
    <td colspan="5" style="border-collapse: collapse; border: 1px solid"><strong>Data afericao: </strong>-</td>
  </tr> 
  <tr style="border-collapse: collapse; border-top: 1.5px solid black">
    <td colspan="9" style="text-align: center;"><strong>Cervicos Executados </strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9"><strong>{{ $data['serviceExecute'] }} </strong></td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9"><strong>ATR: {{ $data['art'] }} - ENEGENHEIRO : {{ $data['ingenier'] }} </strong></td>
  </tr style="border-collapse: collapse; border: 1px solid">
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr style="border-collapse: collapse; border: 1px solid">
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr style="border-collapse: collapse; background-color: rgba(0, 0, 0, 0.1); border: 1.5px solid black">
    <td colspan="6" style="border-collapse: collapse; border: 1px solid"><strong>Tecnico executante: </strong>{{ $data['tecnico'] }} </td>
    <td colspan="3" style="border-collapse: collapse; border: 1px solid"><strong>Data:</strong> {{ $data['data'] }} </td>
  </tr>
</table>
</body>
</html>
