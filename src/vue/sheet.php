
<div id="app">
    <h3>Character Sheet</h3>
    <nav class="navapp">
        <ul>
            <li> <router-link to="/aionGRPlaravel/public/mycharacters"><button type="button" class="btn btn-light">My Characters</button></router-link></li>
            <li>  <router-link to="/aionGRPlaravel/public/searchcharacters"><button type="button" class="btn btn-light">Search Characters</button></router-link></li>
            <li> <router-link to="/aionGRPlaravel/public/accountfusion"><button type="button" class="btn btn-light">Import Characters</button></router-link></li>
        </ul>
    </nav>
    <router-view></router-view>
</div>

<script>

    var name='<?php echo $this->var[0]->data['username']?>';
    var api='<?php echo $this->var[0]->data['api']?>';
    var burl='https://elineda.ovh/aionGRP/';

</script>

<script src="js/app.js"></script>