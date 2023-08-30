@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to the Corruption Reporting System</h1>
                <p>Join us in the fight against corruption and make a difference in your community.</p>
                <p>
    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button" data-toggle="tooltip" data-placement="top" title="Click to log in">Login</a>
    <a class="btn btn-success btn-lg" data-toggle="modal" data-target="#corruptionModal" role="button" data-toggle="tooltip" data-placement="top" title="Click to report">Report</a>
</p>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Why Report Corruption?</h2>
            <p>Reporting corruption is essential for:</p>
            <ul>
                <li>Ensuring transparency and accountability.</li>
                <li>Preventing the misuse of public resources.</li>
                <li>Promoting ethical conduct in society.</li>
                <li>Creating a better future for all.</li>
                <li>Being a responsible citizen.</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Be Part of Our Anti-Corruption Community</h2>
            <p>Join the Corruption Reporting System and:</p>
            <ul>
                <li>Report corruption incidents anonymously.</li>
                <li>Collaborate with others to expose corruption.</li>
                <li>Participate in corruption prevention initiatives.</li>
                <li>Work towards a corruption-free society.</li>
                <li>Make your voice heard.</li>
            </ul>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="corruptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Corruption Reporting Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Insert the form here -->
                    <div class="form-container">
                        <form id="corruption-form" action="{{ route('submit-corruption-report') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="submit-details">Submit Your Details:</label>
                                <input type="checkbox" id="submit-details" name="submit-details" class="form-check-input" style="margin-left: 10%; background-color:blue">
                            </div>
                            <div id="details-fields" style="display: none;">
                                <div class="form-group">
                                    <label for="name">Your Name:</label>
                                    <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email:</label>
                                    <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="region">Select Region:</label>
                                <select id="region" name="region" class="form-control">
                                    <option value="" disabled selected>Select your region</option>
                                 
                                    <option value="Arusha">Arusha</option>
                                    <option value="Dar es Salaam">Dar es Salaam</option>
                                <option value="Dodoma">Dodoma</option>
                                <option value="Geita">Geita</option>
                                <option value="Iringa">Iringa</option>
                                <option value="Kagera">Kagera</option>
                                <option value="Katavi">Katavi</option>
                                <option value="Kigoma">Kigoma</option>
                                <option value="Kilimanjaro">Kilimanjaro</option>
                                <option value="Lindi">Lindi</option>
                                <option value="Manyara">Manyara</option>
                                <option value="Mara">Mara</option>
                                <option value="Mbeya">Mbeya</option>
                                <option value="Morogoro">Morogoro</option>
                                <option value="Mtwara">Mtwara</option>
                                <option value="Mwanza">Mwanza</option>
                                <option value="Njombe">Njombe</option>
                                <option value="Pemba North">Pemba North</option>
                                <option value="Pemba South">Pemba South</option>
                                <option value="Pwani">Pwani</option>
                                <option value="Rukwa">Rukwa</option>
                                <option value="Ruvuma">Ruvuma</option>
                                <option value="Shinyanga">Shinyanga</option>
                                <option value="Simiyu">Simiyu</option>
                                <option value="Singida">Singida</option>
                                <option value="Songwe">Songwe</option>
                                <option value="Tabora">Tabora</option>
                                <option value="Tanga">Tanga</option>
                                <option value="Zanzibar Central/South">Zanzibar Central/South</option>
                                <option value="Zanzibar North">Zanzibar North</option>
                                <option value="Zanzibar Urban/West">Zanzibar Urban/West</option>

                                                                    <!-- Add more options for other regions -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="organization">Select Organization Type:</label>
                                <select id="organization" name="organization" class="form-control">
                                    <option value="" disabled selected>Select organization type</option>
                                    <option value="NGO">NGO</option>
                                    <option value="Government">Government</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="incident">Incident Details:</label>
                                <textarea id="incident" name="incident" rows="5" placeholder="Describe the corruption incident" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="files">Attach Files:</label>
                                <input type="file" id="files" name="files[]" multiple class="form-control-file">
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Function to toggle the display of the details fields based on the checkbox selection
    function toggleDetailsFields() {
        var submitDetailsCheckbox = document.getElementById('submit-details');
        var detailsFields = document.getElementById('details-fields');

        if (submitDetailsCheckbox.checked) {
            detailsFields.style.display = 'block';
        } else {
            detailsFields.style.display = 'none';
        }
    }

    // Add event listener to the submit details checkbox
    var submitDetailsCheckbox = document.getElementById('submit-details');
    submitDetailsCheckbox.addEventListener('change', toggleDetailsFields);
</script>
@endsection
