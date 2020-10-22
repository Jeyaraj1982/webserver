  <div class="content">
    <div class="hpanel">
        <div class="panel-body list">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Choose Plan</label>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <select id="plan" class="form-control">
                        <option value="G3">G3</option>
                        <option value="GOLDWAY">Good Way</option>
                        <option value="MYGOLD">My Gold</option>
                        <option value="SUPERGOLD">Super Gold</option>
                    </select>
                </div>
                <div class="col-sm-1"><input type="button" value="Go" class="btn btn-outline btn-success" id="GoBtn" onclick="OpenWin();"></div>
            </div>
        </div>
    </div>
  </div>
   <script>
        function OpenWin() {
            location.href='dashboard.php?action='+document.getElementById("plan").value;
        }
    </script>     