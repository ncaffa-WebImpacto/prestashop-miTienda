<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerKsjenuu\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerKsjenuu/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerKsjenuu.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerKsjenuu\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerKsjenuu\appProdProjectContainer([
    'container.build_hash' => 'Ksjenuu',
    'container.build_id' => 'eaa14952',
    'container.build_time' => 1589546190,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerKsjenuu');
