<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Contact
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contacts', route('contact.index'));
});

// Home > Contact > [Contact]
Breadcrumbs::for('contact_details', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('contact');
    $trail->push($contact->name, route('contact_details.index', $contact));
});
