from rest_framework.serializers import ModelSerializer
from .models import Post
import rest_framework.permissions

class PostSerializer(ModelSerializer):
    class Meta:
        model = Post
        fields = [
            "id",
            "author",
            "title",
            "slug",
            "body",
            "img",
            "category",
            "created_at",
            "updated_at",
        ]
        depth = 1
