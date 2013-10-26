<?php echo $this->element('header'); ?>
<div id="header">
    <h1>Retiree Support Center </h1>
    <div style="width:38%; text-align: right; color:black; font-size:60%;">brought to you by SGIA</div>
</div>
<div class="header_number">
    888-845-0449
    <button class="button"><?php echo $this->Html->link('My Account', array('controller' => 'users', 'action'=>'login'))?></button>
</div>
<div id='cssmenu'>
    <ul>
        <li class='active'><?php echo $this->Html->link('Home', array('controller' => 'home', 'action'=>'index'))?></li>
        <li><?php echo $this->Html->link('About', array('controller' => 'home', 'action'=>'About'))?></li>
        <li><a href='#'><span>Contact</span></a></li>
        <li><?php echo $this->Html->link('FAQ', array('controller' => 'home', 'action'=>'faq'))?></li>
        <li class='last'><?php echo $this->Html->link('Log In', array('controller' => 'users', 'action'=>'login'))?></li>
    </ul>
</div>
<div id="containerPlans">
    <div id="sidebar">
        <div class="gray_header"><span style="color:#ff8c00; font-weight: bold; font-size: 20px;">MY ACCOUNT</span><br/><br/>
            <p class="gray_header_p">My Contact Info</p>
            <p class="gray_header_p">My Drug List</p>
            <p class="gray_header_p">My Favorites Plans</p>
            <p class="gray_header_p">My Appointments</p>
        </div>
        <div id='cssmenu_v'>
            <div class="gray_block">
             <h1>QUESTIONS ?</h1>
             <p>Contact a Licenced Agent</p>
              <p>800-922-1276</p>
              <p>Mon - Fri, 9am - 6pm</p>
            </div>
            <div class="gray_block">
            <h1>RESOURCES</h1>
                <p class="p1">VIsit Our Full FAQ Page</p><br/>
                <p class="bold">Most Commonly Asked Questions:</p><br/>
                <p class="p1">Question #1</p>
                <p class="p1">Question #2</p>
                <p class="p1">Question #3</p>
            </div>
        </div>
    </div>
    <div id="contentPlans">
        <?php echo $this-> fetch('content') ?>
    </div>
    <div id="footer">
        <table>
            <tbody>
            <tr>
                <td style="color: #ffffff;">About SGIA</td>
                <td style="color: #ffffff;">My Account</td>
                <td style="color: #ffffff;">About Medicare</td>
                <td style="color: #000000;">info@domain.com</td>
            </tr>
            <tr>
                <td style="color: #ffffff;">Employer Solutions</td>
                <td style="color: #ffffff;">Help</td>
                <td style="color: #ffffff;">About Medicare Supplements</td>
                <td style="color: #000000;">888-845-0449</td>
            </tr>
            <tr>
                <td style="color: #ffffff;">Broker Solutions</td>
                <td style="color: #ffffff;">Contact</td>
                <td style="color: #ffffff;">How to Pick a Policy</td>
                <td style="color: #000000;">1234 Address Street</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="color: #000000;">City Name, State 12345</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->element('footer'); ?>
