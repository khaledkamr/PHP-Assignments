<?php

switch ($role) {
  case 'admin':
    echo "You have full access to the system.";
    break;
  case 'editor':
    echo "You can edit and manage content.";
    break;
  case 'viewer':
    echo "You can view the content.";
    break;
  case 'guest':
    echo "You have limited access to the system.";
    break;
  default:
    echo "Invalid role. Please check your user role.";
}