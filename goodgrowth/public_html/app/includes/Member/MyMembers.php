 
 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Choose Plan</span></div>
 <Br>
    
    <select id="plan">
        <option value="G3">G3</option>
        <option value="GOLDWAY">Good Way</option>
        <option value="MYGOLD">My Gold</option>
        <option value="SUPERGOLD">Super Gold</option>
    </select>
    <input type="button" value="Go" id="GoBtn" onclick="OpenWin();">
    <script>
        function OpenWin() {
            location.href='dashboard.php?action='+document.getElementById("plan").value;
        }
    </script>
    
  </div>