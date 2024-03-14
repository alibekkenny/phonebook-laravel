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
    $trail->push('Contact Details', route('contact_details.index', $contact));
});

// Admin users
Breadcrumbs::for('admin_user', function (BreadcrumbTrail $trail) {
    $trail->push('Users', route('admin.user.index'));
});

// Admin users > Contact
Breadcrumbs::for('admin_contact', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('admin_user');
    $trail->push('Contact', route('admin.user.contact', ['user' => $user]));
});

// Admin users > Contact > Contact Details
Breadcrumbs::for('admin_contact_details', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('admin_contact', $contact->user);
    $trail->push('Contact Details', route('admin.contact.contact_details', ['contact' => $contact]));
});
