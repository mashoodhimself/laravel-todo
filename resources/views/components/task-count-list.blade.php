<ul style="list-style: none;" >
    <li><a class="{{ request()->routeIs('home') ? 'text-dark' : ''  }}"  href="/">All ({{ $allCount  }})</a></li>
    <li><a class="{{ request()->routeIs('progress') ? 'text-dark' : ''  }}"  href="/?progress=progress">Progress ({{ $progressCount }})</a></li>
    <li><a class="{{ request()->routeIs('completed') ? 'text-dark' : ''  }}" href="/?completed=completed">Completed ({{ $completeCount }})</a></li>
    <li><a class="{{ request()->routeIs('trashed') ? 'text-dark' : ''  }}" href="/?trashed=trashed">Trashed ({{ $trashCount  }})</a></li>
</ul>