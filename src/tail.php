<?php
namespace PHRamda;

function tail($subject)
{
    if (is_array($subject)) {
        return array_slice($subject, 1);
    }
    if (is_string($subject)) {
        return substr($subject, 1);
    }
    return null;
}

// alias for tail
function rest($subject)
{
  return tail($subject);
}
