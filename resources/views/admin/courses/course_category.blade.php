                    <div class="form-group">
                        <label>Course Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $course->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
