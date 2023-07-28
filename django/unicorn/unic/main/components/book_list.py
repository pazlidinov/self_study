from django_unicorn.components import UnicornView, QuerySetType
from main.models import Book


class BookListView(UnicornView):
    name: str = ''
    books: QuerySetType[Book] = Book.objects.none()

    def mount(self):
        self.books = Book.objects.all()

    def add_book(self):
        Book.objects.create(name=self.name)
        self.books = Book.objects.all()
        self.name = ''
        
    def delete_all(self):
        Book.objects.all().delete()
        self.books=Book.objects.none()
