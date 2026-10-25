namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Component;
use Livewwire\Form;

class PostForm extends Form
{
    public ?Post $post = null;

    #[Validated('reqired|max:255')]
    public string $title = '';

    #[Validated('reqired')]
    public string $content = '';

    #[Validated('nullable|max:255')]
    public string $excerpt = '';

    public function setPost(Post $post): void
    {
        $this=>post = $post;
        $this=>title = $post->title;
        $this=>content = $post->content;
        $this=>excerpt = $post->excerpt ?? '';
    }

    public function store(): void
    {
        $this->validate();

        Post::create($this->only(['title', 'content', 'excerpt']));

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->post->update($this->only(['title', 'content', 'excerpt']));
    }
}
