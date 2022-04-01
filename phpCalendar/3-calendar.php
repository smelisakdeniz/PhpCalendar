<!DOCTYPE html>
<html>
  <head>
    <title>Takvim</title>
    <link rel="stylesheet" href="6-calendar.css">
    <script src="5-calendar.js"></script>
  </head>
  <body>
    <!-- (A) PERIOD SELECTOR -->
    <div id="calPeriod"><?php
      // (A1) MONTH SELECTOR
      // NOTE: DEFAULT TO CURRENT SERVER MONTH YEAR
      $months = [
        1 => "Ocak ", 2 => "Şubat", 3 => "Mart", 4 => "Nisan",
        5 => "Mayıs", 6 => "Haziran", 7 => "Temmuz", 8 => "Ağustos",
        9 => "Eylül", 10 => "Ekim", 11 => "Kasım", 12 => "Aralık"
      ];
      $monthNow = date("m");
      echo "<select id='calmonth'>";
      foreach ($months as $m=>$mth) {
        printf("<option value='%s'%s>%s</option>",
          $m, $m==$monthNow?" selected":"", $mth
        );
      }
      echo "</select>";

      // (A2) YEAR SELECTOR
      echo "<input type='number' id='calyear' value='".date("Y")."'/>";
    ?></div>

    <!-- (B) CALENDAR WRAPPER -->
    <div id="calwrap"></div>
    

    <!-- (C) EVENT FORM -->
    <div id="calblock"><form id="calform">
      <input type="hidden" name="req" value="Kaydet"/>
      <input type="hidden" id="evtid" name="eid"/>
      <label for="start">Başlangıç Tarihi</label>
      <input type="datetime-local" id="evtstart" name="start" required/>
      <label for="end">Tarih Sonu</label>
      <input type="datetime-local" id="evtend" name="end" required/>
      <label for="txt">Etkinlik</label>
      <textarea id="evttxt" name="txt" required></textarea>
      <label for="color">Renk</label>
      <input type="color" id="evtcolor" name="color" value="#e4edff" required/>
      <input type="submit" id="calformsave" value="Kaydet"/>
      <input type="button" id="calformdel" value="Sil"/>
      <input type="button" id="calformcx" value="Çıkış"/>
    </form></div>
  </body>
</html>
