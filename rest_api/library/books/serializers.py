from rest_framework import serializers

from .models import Book

class BookSerializer(serializers.ModelSerializer):
    class Meta:
        model = Book
        fields = ('id', 'title', 'slug', 'subtitle', 'rating', 'image', 'price', 'author', 'author_job', 'about_book','book_file', 'isbn')