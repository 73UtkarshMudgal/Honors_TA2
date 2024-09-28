<?php
require 'includes/functions.php';

// Fetch all contacts from the database
$contacts = selectAll('contacts');

// Include the view for displaying contacts
include 'views/index.view.php';
