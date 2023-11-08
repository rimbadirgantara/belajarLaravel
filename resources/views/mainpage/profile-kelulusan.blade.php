@extends('layouts.mainLayouts')
@section('container')

<div class="container">
  <div class="row">
    <h3 class="mt-3">Profil Kelulusan</h3>
    <p>Berbagai peran yang dapat dilakukan oleh lulusan program studi Sistem Informasi di bidang keahlian atau bidang kerja tertentu setelah menyelesaikan masa perkuliahan.</p>

    <div class="col-lg">
      <table class="table table-bordered table-hover">
        <thead>
          <tr class="text-center">
            <th>Profil</th>
            <th>Capaian</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Information Security Risk Analyst</td>
            <td>Seorang analis risiko keamanan informasi, tugas Anda adalah membantu menilai setiap potensi ancaman dan menentukan apakah sistem jaringan Anda saat ini rentan terhadap ancaman tersebut atau tidak. </td>
          </tr>
          <tr>
            <td>Security Analyst</td>
            <td>Seorang analis security adalah pihak yang merancang, melaksanakan, memantau dan juga mengupgrade setiap langkah keamanan agar jaringan komputer di perusahaan bisa terlindungi. </td>
          </tr>
          <tr>
            <td>Network Designer</td>
            <td>Seorang yang men-desain infrastruktur Jaringan Komunikasi untuk LAN (Local Area Network) maupun WAN (Wide Area Network). </td>
          </tr>
          <tr>
            <td>Information System Security Engineer</td>
            <td>Seorang yang memantau dan memastikan keamanan perangkat keras (hardware) dan perangkat lunak (software) dari kemungkinan penyalahgunaan, kebocoran data, gangguan, penyadapan, peretasan, dan ancaman kejahatan dunia maya lainnya.  </td>
          </tr>
          <tr>
            <td>Application Developer</td>
            <td>Pengembang perangkat lunak adalah individu, komunitas atau perusahaan yang membuat perangkat lunak. </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection