<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerZbVKlUx\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerZbVKlUx/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerZbVKlUx.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerZbVKlUx\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerZbVKlUx\App_KernelDevDebugContainer([
    'container.build_hash' => 'ZbVKlUx',
    'container.build_id' => '01ac9f0c',
    'container.build_time' => 1706608378,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerZbVKlUx');
