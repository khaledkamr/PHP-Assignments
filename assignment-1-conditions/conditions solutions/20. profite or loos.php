<?php

if ($sellingPrice > $costPrice) {
  echo "Profit: " . ($sellingPrice - $costPrice);
} 
elseif ($sellingPrice < $costPrice) {
  echo "Loss: " . ($costPrice - $sellingPrice);
} 
else {
  echo "No Profit No Loss";
}
