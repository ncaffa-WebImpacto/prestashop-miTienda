<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLxfe6jl\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLxfe6jl/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerLxfe6jl.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerLxfe6jl\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerLxfe6jl\appProdProjectContainer([
    'container.build_hash' => 'Lxfe6jl',
    'container.build_id' => 'ba9636c3',
    'container.build_time' => 1589385387,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLxfe6jl');