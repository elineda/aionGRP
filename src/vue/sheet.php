
<div id="app">
    <h3>Character Sheet</h3>
    <nav class="navapp">
        <ul>
            <li> <router-link to="/aionGRPlaravel/public/mycharacters">My Characters</router-link></li>
            <li>  <router-link to="/aionGRPlaravel/public/searchcharacters">Search Characters</router-link></li>
            <li> <router-link to="/aionGRPlaravel/public/accountfusion">Account Fusion</router-link></li>
        </ul>
    </nav>
    <router-view></router-view>
</div>

<script>

    var name='<?php echo $this->var[0]->data['username']?>';
    var password='<?php echo $this->var[0]->data['user_password']?>';
    var password='<?php echo $this->var[0]->data['api']?>';

</script>

<script src="js/app.js"></script>
