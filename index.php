<html>
<head>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body ng-app="demoApp">

<div class="navbar navbar-default navbar-fixed-top" role="navigation" ng-controller="NavbarCtrl">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ForceNG</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#" ng-click="login()">Login</a></li>
                <li><a href="#" ng-click="discardToken()">Discard Token</a></li>
                <li><a href="#" ng-click="isLoggedIn()">Is Logged In?</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 70px;" ng-controller="ContactCtrl">
 <table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <td>Component Type</td>
            <td>Parent Object</td>
            <td>API Name</td>
           
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                 <input list="browsers" name="browser" id="browser">
                  <datalist id="browsers">
                    <option value="Edge">
                    <option value="Firefox">
                    <option value="Chrome">
                    <option value="Opera">
                    <option value="Safari">
                  </datalist>
            </td>
            <td class="col-sm-4">
                <input type="mail" name="mail"  class="form-control"/>
            </td>
            <td class="col-sm-3">
                <input type="text" name="phone"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>

 
   <!-- <div class="row">
        <div class="col-xs-12 col-sm-4">
            <p><button type="button" class="btn btn-default" ng-click="query()"><i
                    class="glyphicon glyphicon-refresh"></i> Get Contacts</button></p>
            <ul id="list" class="list-group">
                <a ng-repeat="item in contacts" href="#" class="list-group-item" ng-click="retrieve(item.Id)">{{item.FirstName}} {{item.LastName}}</a>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-8">
            <p><button type="button" class="btn btn-default" ng-click="newContact()"><i class="glyphicon glyphicon-plus"></i> New</button></p>
            <form role="form">
                <div class="form-group">
                    <label for="contactId">Id</label>
                    <input type="text" class="form-control" id="contactId" ng-model="contact.Id" disabled>
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" ng-model="contact.FirstName">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" ng-model="contact.LastName">
                </div>
                <button type="button" class="btn btn-default" ng-if="!contact.Id" ng-click="create()">Create</button>
                <button type="button" class="btn btn-default" ng-if="contact.Id" ng-click="update()">Update</button>
                <button type="button" class="btn btn-default" ng-if="contact.Id" ng-click="del()">Delete</button>
            </form>
        </div>
    </div>-->

</div>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="forceng.js"></script>
<script src="app.js"></script>
<script src="controllers.js"></script>
<script>
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td> <input list="browsers" name="browser' + counter + '"id="browser' + counter + '"><datalist id="browsers' + counter + '"><option value="Edge"><option value="Firefox"><option value="Chrome"><option value="Opera"><option value="Safari"></datalist></td>';
        cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});
function submit() {
        var myTab = document.getElementById('myTable');
        var arrValues = new Array();

        // loop through each row of the table.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            // loop through each cell in a row.
            for (c = 0; c < myTab.rows[row].cells.length; c++) {
                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') == 'text') {
                    arrValues.push("'" + element.childNodes[0].value + "'");
                }
            }
        }
        
        // finally, show the result in the console.
        console.log(arrValues);
    }
</script>
</body>
</html>