<div class="container-fluid" ng-controller="PaginationDemoCtrl">
    <div class="row">
        <form action="" method="" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">Data Table</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>SL</td>
                            <td>Name</td>
                            <td>Capital</td>
                            <td>Region</td>
                            <td>Area</td>
                            <td>Coordinate</td>
                        </tr>

                        <tr ng-repeat="country in countries|limitTo:20">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ country.name.common }}</td>
                            <td>{{ country.capital }}</td>
                            <td>{{ country.region }}</td>
                            <td>{{ country.area }}</td>
                            <td>{{ country.latlng }}</td>
                        </tr>
                    </table>

                    

                    <div ng-controller="PaginationDemoCtrl">

                        <uib-pagination total-items="bigTotalItems" ng-model="bigCurrentPage" max-size="maxSize" class="pagination-sm" boundary-links="true" rotate="false"></uib-pagination>

                        <pre>Page: {{bigCurrentPage}} / {{numPages}}</pre>

                    </div>
                </div>

                <div class="panel-footer">&nbsp;</div>
            </div>
        </form>
    </div>



    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Bootstrap Table
            </div>

            <div class="panel-body">
                <table class="table table-hover">
                    <caption class="text-center">Responsive Table</caption>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Service</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2016-06-30</td>
                        <td>Imtiaz</td>
                        <td>abc</td>
                        <td>cdf</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2016-06-30</td>
                        <td>Imtiaz</td>
                        <td>abc</td>
                        <td>cdf</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2016-06-30</td>
                        <td>Imtiaz</td>
                        <td>abc</td>
                        <td>cdf</td>
                    </tr>
                </table>


                <table class="table table-hover table-condensed table-bordered">
                    <caption class="text-center">Border</caption>
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Capital</th>
                            <th>Region</th>
                            <th>Area</th>
                            <th>Coordinate</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>asd</td>
                            <td>def</td>
                            <td>sef</td>
                            <td>fe</td>
                            <td>sef</td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>asd</td>
                            <td>def</td>
                            <td>sef</td>
                            <td>fe</td>
                            <td>sef</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>


    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Custom Table
            </div>

            <div class="panel-body">
                <table class="table table-bordered table-input">
                    <tr>
                        <th>SL</th>
                        <th>Text Box</th>
                        <th>Number</th>
                        <th>Select Box</th>
                        <th>Email</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td><input type="text"></td>
                        <td><input type="number"></td>
                        <td>
                            <select>
                                <option value="1">OPT 1</option>
                                <option value="2">OPT 2</option>
                                <option value="3">OPT 3</option>
                                <option value="4">OPT 4</option>
                            </select>
                        </td>
                        <td><input type="email"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input type="text"></td>
                        <td><input type="number"></td>
                        <td>
                            <select>
                                <option value="1">OPT 1</option>
                                <option value="2">OPT 2</option>
                                <option value="3">OPT 3</option>
                                <option value="4">OPT 4</option>
                            </select>
                        </td>
                        <td><input type="email"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input type="text"></td>
                        <td><input type="number"></td>
                        <td>
                            <select>
                                <option value="1">OPT 1</option>
                                <option value="2">OPT 2</option>
                                <option value="3">OPT 3</option>
                                <option value="4">OPT 4</option>
                            </select>
                        </td>
                        <td><input type="email"></td>
                    </tr>
                </table>

                 <table class="table table-bordered table-input table-even">
                    <tr>
                        <th>SL</th>
                        <th>Text Box</th>
                        <th>Number</th>
                        <th>Select Box</th>
                        <th>Email</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td><input type="text"></td>
                        <td><input type="number"></td>
                        <td>
                            <select>
                                <option value="1">OPT 1</option>
                                <option value="2">OPT 2</option>
                                <option value="3">OPT 3</option>
                                <option value="4">OPT 4</option>
                            </select>
                        </td>
                        <td><input type="email"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input type="text"></td>
                        <td><input type="number"></td>
                        <td>
                            <select>
                                <option value="1">OPT 1</option>
                                <option value="2">OPT 2</option>
                                <option value="3">OPT 3</option>
                                <option value="4">OPT 4</option>
                            </select>
                        </td>
                        <td><input type="email"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input type="text"></td>
                        <td><input type="number"></td>
                        <td>
                            <select>
                                <option value="1">OPT 1</option>
                                <option value="2">OPT 2</option>
                                <option value="3">OPT 3</option>
                                <option value="4">OPT 4</option>
                            </select>
                        </td>
                        <td><input type="email"></td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td><input type="text"></td>
                        <td><input type="number"></td>
                        <td>
                            <select>
                                <option value="1">OPT 1</option>
                                <option value="2">OPT 2</option>
                                <option value="3">OPT 3</option>
                                <option value="4">OPT 4</option>
                            </select>
                        </td>
                        <td><input type="email"></td>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>