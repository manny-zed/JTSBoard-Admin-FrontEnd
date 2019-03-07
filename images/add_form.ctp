<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script type="text/javascript" src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
 
        <script type="text/javascript">
            var SiteUrl = "https://jtsboard.com/";
            var SiteName = "JSTBoard";
            var CurrentUrl = "/Customersform/add_form";

        </script>
  <script>
  jQuery(function($) {
    var fbEditor = document.getElementById('build-wrap');
    var options = {
      disableFields: [
        'autocomplete',
        'file',
        'button',
        'paragraph',
        'number',
        'hidden'
      ]
    };
    var formBuilder = $(fbEditor).formBuilder(options);
    var form_text;
    var service_id;
    document.getElementById('getJSON').addEventListener('click', function() {
      // alert(formBuilder.actions.getData('json'));
      // console.log(formBuilder.actions.getData('json'));
      form_text = formBuilder.actions.getData('json');
      service_id = $('#service_id').val();
      form_name = $('#form_name').val();
      user_id = $('#user_id').val();

      $.ajax({
            url: "add_form/".user_id,
            type: 'post',
            data: {'form_text':form_text,'service_id':service_id,'form_name':form_name},
            success: function(result){
                console.log(result);
                // return false;
                var delay = 1000; 
                setTimeout(function(){ window.location = '/Customersform/list_form'; }, delay);
            }
        });
    });
  });

  </script>
<div class="main-content">
                
  <div class="container">
     <div class="panel panel-default">
      <div class="panel-heading">
          Pay 15000¥ to JTS Board
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
                  <?php  echo ($this->Form->input('service_id', array('options'=>$serviceList,'div'=>false,  'label' => 'Service',  "class" => "form-control")));?>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                  <?php echo ($this->Form->input('form_name', array('div' => false, 'label' => 'Form Name', 'type'=>'text', "class" => "form-control","maxlength"=>30))); ?>
              </div>
          </div>
           <?php echo ($this->Form->input('user_id', array('type' =>'hidden', 'value' => $user_id))); ?>
        </div>
        <div id="build-wrap"></div>
        <div class="setDataWrap">
          <!-- <button id="getXML" type="button">Get XML Data</button> -->
          <button id="getJSON" type="button">Save Form</button>
          <!-- <button id="getJS" type="button">Get JS Data</button> -->
        </div>
      </div>
      </div>
      </div>